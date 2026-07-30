<?php

namespace App\Http\Controllers\Typeincidents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Incident\IncidentTypeModel;
use App\Models\Incident\IncidentSubTypeModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
class TypeincidentsController extends Controller
{
    //

        public function index()
    {
        $projects = Project::latest()->get();
        $typesincident= IncidentTypeModel::all();
        $soustypesincident= IncidentSubTypeModel::all();
      $totalTypesIncident = IncidentTypeModel::count();
      $totalSousTypesIncident = IncidentSubTypeModel::count();

        return view('typeincidents.typeincidents', compact('projects','typesincident','totalTypesIncident','totalSousTypesIncident'));
    }

      public function getData(Request $request)
    {
        if ($request->ajax()) {

        $query = IncidentTypeModel::query();

        return DataTables::of($query)

            ->editColumn('libelletypeincident', function ($row) {

                return '<span class="badge bg-light-warning text-warning">'
                        .$row->libelletypeincident.
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

            $statusIcon = $row->status
    ? '<i class="ti ti-toggle-right"></i>'
    : '<i class="ti ti-toggle-left"></i>';

$statusColor = $row->status ? 'text-success' : 'text-secondary';

                return '

                <div class="actions text-end">

                    <a href="javascript:void(0)"
                       class="text-primary me-2 editType"
                       data-id="'.$row->id.'">

                        <i class="ti ti-edit"></i>

                    </a>

                     <a href="javascript:void(0)"
       class="'.$statusColor.' me-2 changeStatusType"
       data-id="'.$row->id.'"
       title="Changer le statut">
        '.$statusIcon.'
    </a>

                    <a href="javascript:void(0)"
                       class="text-danger deleteType"
                       data-id="'.$row->id.'">

                        <i class="ti ti-trash"></i>

                    </a>

                </div>

                ';

            })

            ->rawColumns([
                'libelletypeincident',
                'status',
                'actions'
            ])

            ->make(true);

    }


    }


    public function updateStatus($id)
{
    $type = IncidentTypeModel::findOrFail($id);

    $type->status = !$type->status;

    $type->save();

    return response()->json([
        'success' => true,
        'message' => 'Statut modifié avec succès.'
    ]);
}

      public function storeFirst(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255|unique:incident_types,libelle',
            'description' => 'nullable|string'
        ],[
            'libelle.required' => 'Le libellé est obligatoire.',
            'libelle.unique'   => 'Ce type d\'incident existe déjà.'
        ]);

        IncidentTypeModel::create([
            'libelle'     => $request->libelle,
            'description' => $request->description,
            'status'      => true,
            'created_by'  => Auth::id()
        ]);

        return redirect()
            ->back()
            ->with('success','Type d\'incident ajouté avec succès.');
    }

    public function store(Request $request)
{
    $request->validate([
        'type_incident' => 'required|string|max:255|unique:incident_types,libelletypeincident',
        'description'   => 'nullable|string',
    ]);

    $incident = IncidentTypeModel::create([
        'libelletypeincident' => $request->type_incident,
        'description'         => $request->description,
        'status'              => true,
        'created_by'          => Auth::id()
    ]);

    return response()->json([
        'success' => true,
        'message' => "Type d'incident enregistré avec succès.",
        'data'    => $incident
    ]);
}

    /**
     * Afficher un type
     */
    public function show($id)
    {
        $incidentType = IncidentTypeModel::findOrFail($id);

        return response()->json($incidentType);
    }

    /**
     * Formulaire d'édition (optionnel si tu utilises un modal)
     */
    public function edit($id)
    {
        $incidentType = IncidentTypeModel::findOrFail($id);

        return response()->json($incidentType);
    }

    /**
     * Modifier
     */
    public function update(Request $request, $id)
    {
       

      $request->validate([

        'type_incident' => 'required|max:255|unique:incident_types,libelletypeincident,'.$id,

        'description' => 'nullable'

    ]);
 $incidentType = IncidentTypeModel::findOrFail($id);

        $incidentType->update([
            'libelletypeincident' => $request->type_incident,
            'description'         => $request->description,
           // 'status'              => $request->status
        ]);

    return response()->json([

        'success'=>true,

        'message'=>'Modification effectuée.'

    ]);

    }

    public function afficherliste()
{
    return response()->json(
        IncidentTypeModel::where('status', true)
            ->orderBy('libelletypeincident')
            ->get(['id', 'libelletypeincident'])
    );
}


     public function updatesecond(Request $request)
    {
       
     $id=$request->input('incident_id');
      $request->validate([

        'type_incident' => 'required|max:255|unique:incident_types,libelletypeincident,'.$id,

        'description' => 'nullable'

    ]);
 $incidentType = IncidentTypeModel::findOrFail($id);

        $incidentType->update([
            'libelletypeincident' => $request->type_incident,
            'description'         => $request->description,
           // 'status'              => $request->status
        ]);

    return response()->json([

        'success'=>true,

        'message'=>'Modification effectuée.'

    ]);

    }

    /**
     * Changer le statut
     */
    public function changeStatus($id)
    {
        $incidentType = IncidentTypeModel::findOrFail($id);

        $incidentType->status = !$incidentType->status;

        $incidentType->save();

        return back()->with('success','Statut mis à jour.');
    }

    /**
     * Suppression
     */
    public function destroyFirst($id)
    {
        $incidentType = IncidentTypeModel::findOrFail($id);

        // Empêcher la suppression si des sous-types existent
        if ($incidentType->subTypes()->count() > 0) {

            return back()->with(
                'error',
                'Impossible de supprimer ce type car il possède des sous-types.'
            );

        }

        $incidentType->delete();

        return back()->with('success','Type d\'incident supprimé.');
    }

    public function destroy($id)
{
    IncidentTypeModel::findOrFail($id)->delete();

    return response()->json([

        'success'=>true,

        'message'=>'Suppression effectuée.'

    ]);
}
}
