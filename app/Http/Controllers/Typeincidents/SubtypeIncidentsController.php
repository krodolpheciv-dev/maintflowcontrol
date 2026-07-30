<?php

namespace App\Http\Controllers\Typeincidents;

use App\Http\Controllers\Controller;
use App\Models\Incident\IncidentSubTypeModel;
use App\Models\Incident\IncidentTypeModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
class SubtypeIncidentsController extends Controller
{
    //

        public function index()
    {
        $projects = Project::latest()->get();
        return view('typeincidents.typeincidents', compact('projects'));
    }


    public function getByType($id)
{
    $subTypes = IncidentSubTypeModel::where('incident_type_id', $id)
        ->where('status', true)
        ->orderBy('libellesoustype')
        ->get(['id', 'libellesoustype']);

    return response()->json($subTypes);
}

      public function getData(Request $request)
    {
        if ($request->ajax()) {

        $query = IncidentSubTypeModel::query();

        return DataTables::of($query)

            ->addColumn('libelletypeincident', function ($row) {

          $incidentType = IncidentTypeModel::findOrFail($row->incident_type_id);

                return '<span class="badge bg-light-warning text-warning">'
                        .$incidentType->libelletypeincident.
                       '</span>';

            })
            ->editColumn('libellesoustype', function ($row) {

        

                return '<span class="badge bg-light-warning text-warning">'
                        .$row->libellesoustype.
                       '</span>';

            })

            ->editColumn('status', function ($row) {

                if($row->status){

                    return '<span class="badge bg-light-success">Actif</span>';

                }

                return '<span class="badge bg-light-danger">Inactif</span>';

            })

            ->editColumn('created_at', function ($row){

                return $row->created_at->format('d/m/Y');

            })

            ->addColumn('actions', function ($row){

    $statusIcon = $row->status? '<i class="ti ti-toggle-right"></i>':'<i class="ti ti-toggle-left"></i>';

    $statusColor = $row->status ? 'text-success' : 'text-secondary';

                return '
<div class="actions text-end">

    <a href="javascript:void(0)"
       class="text-primary me-2 editTypesub"
       data-id="'.$row->id.'"
       title="Modifier">
        <i class="ti ti-edit"></i>
    </a>

    <a href="javascript:void(0)"
       class="'.$statusColor.' me-2 changeStatusTypesub"
       data-id="'.$row->id.'"
       title="Changer le statut">
        '.$statusIcon.'
    </a>

    <a href="javascript:void(0)"
       class="text-danger deleteTypesub"
       data-id="'.$row->id.'"
       title="Supprimer">
        <i class="ti ti-trash"></i>
    </a>

</div>

                ';

            })

            ->rawColumns([
                'libelletypeincident',
                'libellesoustype',
                'status',
                'actions'
            ])

            ->make(true);

    }


    }

        public function show($id)
    {
        $incidentType = IncidentSubTypeModel::findOrFail($id);

        return response()->json($incidentType);
    }


public function updateStatus($id)
{
    $subType = IncidentSubTypeModel::findOrFail($id);

    $subType->status = !$subType->status;

    $subType->save();

    return response()->json([
        'success' => true,
        'message' => 'Statut modifié avec succès.',
        'status'  => $subType->status
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'subtype_incident' => 'required|exists:incident_types,id',
        'sous_type'        => 'required|string|max:255',
        'description'      => 'nullable|string',
    ]);

    // Vérifier si le sous-type existe déjà pour ce type
    $exists = IncidentSubTypeModel::where('incident_type_id', $request->subtype_incident)
        ->where('libellesoustype', $request->sous_type)
        ->exists();

    if ($exists) {
        return response()->json([
            'success' => false,
            'message' => 'Ce sous-type existe déjà pour ce type d\'incident.'
        ], 422);
    }

    $subType = IncidentSubTypeModel::create([
        'incident_type_id' => $request->subtype_incident,
        'libellesoustype'  => $request->sous_type,
        'description'      => $request->description,
        'status'           => true,
        'created_by'       => Auth::id(),
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Sous-type d\'incident enregistré avec succès.',
        'data'    => $subType
    ]);
}


public function update(Request $request, $id)
{
    $request->validate([
        'subtype_incident' => 'required|exists:incident_types,id',
        'sous_type'        => 'required|string|max:255',
        'description'      => 'nullable|string',
    ]);

    $subType = IncidentSubTypeModel::findOrFail($id);

    // Vérifier les doublons (en excluant l'enregistrement courant)
    $exists = IncidentSubTypeModel::where('incident_type_id', $request->subtype_incident)
        ->where('libellesoustype', $request->sous_type)
        ->where('id', '!=', $id)
        ->exists();

    if ($exists) {
        return response()->json([
            'success' => false,
            'message' => 'Ce sous-type existe déjà pour ce type d\'incident.'
        ], 422);
    }

    $subType->update([
        'incident_type_id' => $request->subtype_incident,
        'libellesoustype'  => $request->sous_type,
        'description'      => $request->description,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Sous-type d\'incident modifié avec succès.'
    ]);
}

public function destroy($id)
{
    $subType = IncidentSubTypeModel::findOrFail($id);

    $subType->delete();

    return response()->json([
        'success' => true,
        'message' => 'Sous-type d\'incident supprimé avec succès.'
    ]);
}


}