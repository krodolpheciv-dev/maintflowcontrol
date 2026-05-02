<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ProjectController extends Controller
{
    //

    public function index()
    {
        $projects = Project::latest()->get();
          $permissions = Permission::orderBy('module')
            ->orderBy('name')
            ->get();

      $roles = Role::orderBy('name')->get();
        return view('admins.creationprojet', compact('projects','roles','projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomprojet' => 'required|string|max:255',
            'datedebut' => 'required|date',
            'datefin' => 'nullable|date|after_or_equal:datedebut',
            'contrat' => 'nullable|file|mimes:pdf,doc,docx'
        ]);

        $filePath = null;

        if ($request->hasFile('contrat')) {
            $filePath = $request->file('contrat')->store('contrats', 'public');
        }

        Project::create([
            'nom_projet' => $request->nomprojet,
            'date_debut' => $request->datedebut,
            'date_fin' => $request->datefin,
            'contrat' => $filePath,
        ]);

        return back()->with('success', 'Projet ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'nomprojet' => 'required|string|max:255',
            'datedebut' => 'required|date',
            'datefin' => 'nullable|date|after_or_equal:datedebut'
        ]);

        $project->update([
            'nom_projet' => $request->nomprojet,
            'date_debut' => $request->datedebut,
            'date_fin' => $request->datefin,
        ]);

        return back()->with('success', 'Projet modifié avec succès');
    }

    // Delete = désactivation
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->update(['is_active' => false]);

        return back()->with('success', 'Projet désactivé');
    }
}
