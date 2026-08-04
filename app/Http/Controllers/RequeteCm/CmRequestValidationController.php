<?php

namespace App\Http\Controllers\RequeteCm;

use App\Http\Controllers\Controller;
use App\Models\requeteCm\CmRequestModel;
use App\Models\requeteCm\CmRequestValidationModel;
use App\Mail\CmRequestValidatedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class CmRequestValidationController extends Controller
{
    public function index()
    {
        return view('forms.validationscm');
    }

    /**
     * DataTable server-side : requêtes en attente de validation.
     */
    public function datatable(Request $request)
    {
        $query = CmRequestModel::with([
            'project', 'site', 'incidentType', 'incidentSubType', 'creator', 'assignedTo'
        ])->whereIn('status', ['Ouverte', 'Affectée', 'En cours']);

        return DataTables::of($query)
            ->addColumn('site_code', function ($row) {
                return $row->site ? $row->site->site_code : '-';
            })
            ->addColumn('incident', function ($row) {
                return $row->incidentType ? $row->incidentType->libelletypeincident : '-';
            })
            ->addColumn('assigne', function ($row) {
                return $row->assignedTo ? $row->assignedTo->name : 'Non affecté';
            })
            ->editColumn('priority', function ($row) {
                return $this->getPriorityBadge($row->priority);
            })
            ->editColumn('status', function ($row) {
                return $this->getStatusBadge($row->status);
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('d/m/Y H:i') : '-';
            })
            ->addColumn('action', function ($row) {
                $btns  = '<a href="#" class="avtar avtar-xs btn-link-secondary btnShow" data-id="' . $row->id . '" title="Voir"><i class="ti ti-eye f-20"></i></a>';
                $btns .= '<a href="#" class="avtar avtar-xs btn-link-success btnValidateOpen" data-id="' . $row->id . '" data-ticket="' . $row->ticket . '" data-site="' . ($row->site ? $row->site->site_code : '') . '" title="Valider"><i class="ti ti-check f-20"></i></a>';
                $btns .= '<a href="#" class="avtar avtar-xs btn-link-danger btnRejectOpen" data-id="' . $row->id . '" data-ticket="' . $row->ticket . '" data-site="' . ($row->site ? $row->site->site_code : '') . '" title="Refuser"><i class="ti ti-x f-20"></i></a>';
                return $btns;
            })
            ->rawColumns(['priority', 'status', 'action'])
            ->make(true);
    }

    /**
     * Affichage détail requête (modale "Voir")
     */
    public function show($id)
    {
        $cmRequest = CmRequestModel::with([
            'project', 'site', 'incidentType', 'incidentSubType', 'creator', 'assignedTo'
        ])->findOrFail($id);

        return response()->json($cmRequest);
    }

    /**
     * Valider une requête
     */
    public function validateRequest(Request $request, $id)
    {
        $request->validate([
            'comment' => 'nullable|string|max:1000',
        ]);

        $cmRequest = CmRequestModel::with([
            'project', 'site', 'incidentType', 'incidentSubType', 'creator', 'assignedTo'
        ])->findOrFail($id);

        if (in_array($cmRequest->status, ['Validée', 'Refusée', 'Terminée', 'Annulée'])) {
            return response()->json([
                'status'  => false,
                'message' => 'Cette requête est déjà traitée (validée, refusée, terminée ou annulée).',
            ], 422);
        }

        // Créer la validation avec décision = 'validee'
        $validation = $this->createValidationSnapshot($cmRequest, 'validee', $request->input('comment'));

        // Mettre à jour le statut de la requête
        $cmRequest->status = 'Validée';
        $cmRequest->completed_at = now();
        $cmRequest->save();

        $this->sendValidationMail($validation);

        return response()->json([
            'status'  => true,
            'message' => 'Requête validée avec succès.',
        ]);
    }

    /**
     * Refuser une requête
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ], [
            'comment.required' => 'Le motif du refus est obligatoire.',
        ]);

        $cmRequest = CmRequestModel::with([
            'project', 'site', 'incidentType', 'incidentSubType', 'creator', 'assignedTo'
        ])->findOrFail($id);

        if (in_array($cmRequest->status, ['Validée', 'Refusée', 'Terminée', 'Annulée'])) {
            return response()->json([
                'status'  => false,
                'message' => 'Cette requête est déjà traitée (validée, refusée, terminée ou annulée).',
            ], 422);
        }

        // Créer la validation avec décision = 'refusee'
        $validation = $this->createValidationSnapshot($cmRequest, 'refusee', $request->input('comment'));

        // Mettre à jour le statut de la requête
        $cmRequest->status = 'Refusée';
        $cmRequest->save();

        $this->sendValidationMail($validation);

        return response()->json([
            'status'  => true,
            'message' => 'Requête refusée avec succès.',
        ]);
    }

    /**
     * Crée l'enregistrement de validation avec le snapshot complet
     * La décision est indépendante du statut de la requête
     */
    protected function createValidationSnapshot(CmRequestModel $cmRequest, $decision, $comment = null)
    {
        $authUser = Auth::user();

        return CmRequestValidationModel::create([
            'cm_request_id' => $cmRequest->id,

            // Snapshot de la requête au moment de la validation
            'ticket'                     => $cmRequest->ticket,
            'project_id'                 => $cmRequest->project_id,
            'project_name'               => $cmRequest->project ? $cmRequest->project->nom_projet : null,
            'site_id'                    => $cmRequest->site_id,
            'site_code'                  => $cmRequest->site ? $cmRequest->site->site_code : null,
            'incident_type_id'           => $cmRequest->incident_type_id,
            'incident_type_libelle'      => $cmRequest->incidentType ? $cmRequest->incidentType->libelletypeincident : null,
            'incident_sub_type_id'       => $cmRequest->incident_sub_type_id,
            'incident_sub_type_libelle'  => $cmRequest->incidentSubType ? $cmRequest->incidentSubType->libellesoustypeincident : null,
            'priority'                   => $cmRequest->priority,
            'impact'                     => $cmRequest->impact,
            'description'                => $cmRequest->description,
            'attachment'                 => $cmRequest->attachment,
            'created_by'                 => $cmRequest->created_by,
            'created_by_name'            => $cmRequest->creator ? $cmRequest->creator->name : null,
            'assigned_to'                => $cmRequest->assigned_to,
            'assigned_to_name'           => $cmRequest->assignedTo ? $cmRequest->assignedTo->name : null,
            'request_status'             => $cmRequest->status,
            'request_created_at'         => $cmRequest->created_at,

           
            'validation_decision' => $decision,
            'comment'              => $comment,

            // Utilisateur qui valide/refuse
            'validated_by'       => $authUser ? $authUser->id : null,
            'validated_by_name'  => $authUser ? $authUser->name : null,
            'validated_by_email' => $authUser ? $authUser->email : null,

            'created_at' => now(),
        ]);
    }

    /**
     * Envoi mail
     */
    protected function sendValidationMail(CmRequestValidationModel $validation)
    {
        try {
            $cmRequest = CmRequestModel::with('creator')->find($validation->cm_request_id);

            if ($cmRequest && $cmRequest->creator && $cmRequest->creator->email) {
                Mail::to($cmRequest->creator->email)->send(new CmRequestValidatedMail($validation));
            }
        } catch (\Exception $e) {
            Log::error('Erreur envoi mail validation CM #' . $validation->cm_request_id . ' : ' . $e->getMessage());
        }
    }

    /**
     * DataTable pour l'historique des validations
     */
    public function historyDatatable(Request $request)
    {
        $history = CmRequestValidationModel::with(['cmRequest', 'validator'])
            ->orderBy('created_at', 'desc');

        return DataTables::of($history)
            ->addColumn('ticket', function ($row) {
                return $row->ticket;
            })
            ->addColumn('validated_by_name', function ($row) {
                return $row->validated_by_name ?? '-';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('d/m/Y H:i') : '-';
            })
            ->editColumn('validation_decision', function ($row) {
               
                if (strtolower($row->validation_decision) === 'validee') {
                    return '<span class="badge bg-success">Validée</span>';
                } else {
                    return '<span class="badge bg-danger">Refusée</span>';
                }
            })
            ->addColumn('cm_request_id', function ($row) {
                return $row->cm_request_id;
            })
            ->addColumn('current_status', function ($row) {
                return $row->cmRequest ? $this->getStatusBadge($row->cmRequest->status) : '-';
            })
            ->rawColumns(['validation_decision', 'current_status'])
            ->make(true);
    }

    /**
     * Récupérer l'historique d'une requête spécifique
     */
    public function getHistory($id)
    {
        try {
            $history = CmRequestValidationModel::where('cm_request_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'status' => true,
                'data' => $history
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement de l\'historique: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Impossible de charger l\'historique'
            ], 500);
        }
    }

    /**
     * Badge priorité
     */
    private function getPriorityBadge($priority)
    {
        $badges = [
            'Critique' => '<span class="badge bg-danger">Critique</span>',
            'Elevée' => '<span class="badge bg-warning text-dark">Élevée</span>',
            'Moyenne' => '<span class="badge bg-info">Moyenne</span>',
            'Faible' => '<span class="badge bg-secondary">Faible</span>',
        ];
        return $badges[$priority] ?? '<span class="badge bg-secondary">' . $priority . '</span>';
    }

    /**
     * Badge statut
     */
    private function getStatusBadge($status)
    {
        $badges = [
            'Ouverte' => '<span class="badge bg-primary">Ouverte</span>',
            'Affectée' => '<span class="badge bg-info">Affectée</span>',
            'En cours' => '<span class="badge bg-warning text-dark">En cours</span>',
            'Suspendue' => '<span class="badge bg-secondary">Suspendue</span>',
            'Terminée' => '<span class="badge bg-success">Terminée</span>',
            'Annulée' => '<span class="badge bg-danger">Annulée</span>',
            'Validée' => '<span class="badge bg-success">Validée</span>',
            'Refusée' => '<span class="badge bg-danger">Refusée</span>',
        ];
        return $badges[$status] ?? '<span class="badge bg-secondary">' . $status . '</span>';
    }
}