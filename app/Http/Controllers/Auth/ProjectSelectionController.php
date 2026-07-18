<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectSelectionController extends Controller
{
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