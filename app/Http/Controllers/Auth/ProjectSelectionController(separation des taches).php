<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectSelectionController extends Controller
{
    public function showSelectionForm()
    {
        /** @var User $user */
        $user = Auth::user();

        $projets = $user->projets()->where('is_active', true)->get();

        if ($projets->count() === 1) {
            $project = $projets->first();
            session([
                'selected_project_id'   => $project->id,
                'selected_project_name' => $project->nom_projet,
            ]);
            return redirect()->route('dashboard');
        }

        if ($projets->isEmpty()) {
            Auth::logout();
            return redirect()->route('login')
                ->withErrors(['email' => 'Aucun projet actif n\'est associé à votre compte.']);
        }

        return view('auth.select-project', compact('projets'));
    }

    public function selectProject(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $project = $user->projets()
            ->where('projects.id', $request->project_id)
            ->where('is_active', true)
            ->first();

        if (!$project) {
            return back()->withErrors(['project_id' => 'Ce projet n\'est pas accessible ou n\'est plus actif.']);
        }

        session([
            'selected_project_id'   => $project->id,
            'selected_project_name' => $project->nom_projet,
        ]);

        return redirect()->route('dashboard');
    }

    public function switchProject($projectId)
    {
        /** @var User $user */
        $user = Auth::user();

        $project = $user->projets()
            ->where('projects.id', $projectId)
            ->where('is_active', true)
            ->first();

        if (!$project) {
            return back()->withErrors(['error' => 'Ce projet n\'est pas accessible ou n\'est plus actif.']);
        }

        session([
            'selected_project_id'   => $project->id,
            'selected_project_name' => $project->nom_projet,
        ]);

        return redirect()->route('dashboard');
    }
}