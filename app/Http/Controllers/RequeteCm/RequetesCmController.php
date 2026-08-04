<?php

namespace App\Http\Controllers\RequeteCm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sites\SiteModel;
use App\Models\requeteCm\CmRequestModel;
use App\Models\Incident\IncidentSubTypeModel;
use App\Models\Incident\IncidentTypeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class RequetesCmController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $typesincident = IncidentTypeModel::all();
        $soustypesincident = IncidentSubTypeModel::all();
        $totalTypesIncident = IncidentTypeModel::count();
        $totalSousTypesIncident = IncidentSubTypeModel::count();

        return view('forms.requetescm', compact('projects', 'typesincident', 'soustypesincident', 'totalTypesIncident', 'totalSousTypesIncident'));
    }

    public function datatablethird(Request $request)
    {
        $requests = CmRequestModel::with([
            'project',
            'site',
            'incidentType',
            'incidentSubType',
            'creator',
            'assignedTo'
        ]);

        return DataTables::eloquent($requests)
            ->addIndexColumn()
            ->addColumn('ticket', function ($row) {
                return '<span class="fw-bold text-primary">' . $row->ticket . '</span>';
            })
            ->addColumn('projet', function ($row) {
                return optional($row->project)->nom_projet;
            })
            ->addColumn('site', function ($row) {
                return optional($row->site)->site_name;
            })
            ->addColumn('site_code', function ($row) {
                return optional($row->site)->site_code;
            })
            ->addColumn('incident', function ($row) {
                return optional($row->incidentType)->libelletypeincident;
            })
            ->addColumn('sous_type', function ($row) {
                return optional($row->incidentSubType)->libellesoustypeincident;
            })
            ->addColumn('assigne', function ($row) {
                if ($row->assignedTo) {
                    return '
                        <span class="badge bg-light-primary text-primary">
                            <i class="ti ti-user me-1"></i>
                            ' . $row->assignedTo->name . '
                        </span>';
                }
                return '<span class="badge bg-light-danger text-danger">Non affecté</span>';
            })
            ->addColumn('createur', function ($row) {
                return optional($row->creator)->name;
            })
            ->editColumn('priority', function ($row) {
                switch ($row->priority) {
                    case 'Critique':
                        return '<span class="badge bg-danger">Critique</span>';
                    case 'Elevée':
                        return '<span class="badge bg-warning text-dark">Elevée</span>';
                    case 'Moyenne':
                        return '<span class="badge bg-info">Moyenne</span>';
                    default:
                        return '<span class="badge bg-success">Faible</span>';
                }
            })
            ->editColumn('impact', function ($row) {
                switch ($row->impact) {
                    case 'Critique':
                        return '<span class="badge bg-danger">Critique</span>';
                    case 'Moyen':
                        return '<span class="badge bg-warning text-dark">Moyen</span>';
                    default:
                        return '<span class="badge bg-success">Faible</span>';
                }
            })
            ->editColumn('status', function ($row) {
                switch ($row->status) {
                    case 'Ouverte':
                        return '<span class="badge bg-primary">Ouverte</span>';
                    case 'Affectée':
                        return '<span class="badge bg-info">Affectée</span>';
                    case 'En cours':
                        return '<span class="badge bg-warning text-dark">En cours</span>';
                    case 'Suspendue':
                        return '<span class="badge bg-secondary">Suspendue</span>';
                    case 'Terminée':
                        return '<span class="badge bg-success">Terminée</span>';
                    case 'Annulée':
                        return '<span class="badge bg-danger">Annulée</span>';
                    default:
                        return $row->status;
                }
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('d/m/Y H:i') : '';
            })
            ->addColumn('action', function ($row) {
                return '
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-light-info btnShow" data-id="' . $row->id . '" title="Voir">
                        <i class="ti ti-eye"></i>
                    </button>
                    <button class="btn btn-light-warning btnEdit" data-id="' . $row->id . '" title="Modifier">
                        <i class="ti ti-edit"></i>
                    </button>
                    <button class="btn btn-light-primary btnAssign" data-id="' . $row->id . '" title="Réaffecter">
                        <i class="ti ti-user-cog"></i>
                    </button>
                    <button class="btn btn-light-danger btnDelete" data-id="' . $row->id . '" title="Supprimer">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>';
            })
            ->rawColumns(['ticket', 'priority', 'impact', 'status', 'assigne', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        $cm = CmRequestModel::with([
            'project',
            'site',
            'incidentType',
            'incidentSubType',
            'creator',
            'assignedTo'
        ])->findOrFail($id);

        return response()->json($cm);
    }

    public function store(Request $request)
    {
        \Log::info('Tentative d\'enregistrement', $request->all());

        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'site_id' => 'required|exists:sites,id',
            'incident_type_id' => 'required|exists:incident_types,id',
            'incident_sub_type_id' => 'required|exists:incident_sub_types,id',
            'priority' => 'required|in:Faible,Moyenne,Elevée,Critique',
            'impact' => 'required|in:Faible,Moyen,Critique',
            'description' => 'required|min:10',
            'assigned_to' => 'nullable|exists:users,id',
            'attachment' => 'nullable|image|mimes:jpg,jpeg,png|max:10240'
        ]);

        if ($validator->fails()) {
            \Log::error('Validation échouée', $validator->errors()->toArray());
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Génération du ticket
            $dernier = CmRequestModel::latest('id')->first();
            $numero = $dernier ? $dernier->id + 1 : 1;
            $ticket = 'CM-' . date('Y') . '-' . str_pad($numero, 5, '0', STR_PAD_LEFT);

            // Upload de la pièce jointe
            $pieceJointe = null;
            if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
                $file = $request->file('attachment');
                $nomFichier = 'CM_' . date('YmdHis') . '_' . Str::upper(Str::random(6)) . '.' . $file->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('cm_requests')) {
                    Storage::disk('public')->makeDirectory('cm_requests');
                }

                Storage::disk('public')->putFileAs('cm_requests', $file, $nomFichier);
                $pieceJointe = 'cm_requests/' . $nomFichier;
            }

            // Création de la requête
            $cm = new CmRequestModel();
            $cm->ticket = $ticket;
            $cm->project_id = $request->project_id;
            $cm->site_id = $request->site_id;
            $cm->incident_type_id = $request->incident_type_id;
            $cm->incident_sub_type_id = $request->incident_sub_type_id;
            $cm->priority = $request->priority;
            $cm->impact = $request->impact;
            $cm->description = $request->description;
            $cm->attachment = $pieceJointe;
            $cm->created_by = Auth::id();
            $cm->assigned_to = $request->assigned_to;

            // Statut automatique
            if (!empty($request->assigned_to)) {
                $cm->status = 'Affectée';
                $cm->assigned_at = now();
            } else {
                $cm->status = 'Ouverte';
            }

            $cm->save();

            DB::commit();

            \Log::info('Requête enregistrée avec succès', ['ticket' => $ticket]);

            return response()->json([
                'status' => true,
                'message' => 'Requête CM enregistrée avec succès.',
                'data' => $cm
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Erreur lors de l\'enregistrement', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}