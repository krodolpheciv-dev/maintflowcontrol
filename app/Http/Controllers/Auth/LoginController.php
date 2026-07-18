<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        if (Auth::check() && session()->has('selected_project_id')) {
            return redirect()->route('dashboard');
        }

        $projets = Project::where('is_active', true)->orderBy('nom_projet')->get();

        return view('auth.login', compact('projets'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'      => 'required|email',
            'password'   => 'required|string',
            'project_id' => 'required|exists:projects,id',
        ], [
            'email.required'      => 'L\'adresse email est obligatoire.',
            'email.email'         => 'Veuillez entrer une adresse email valide.',
            'password.required'   => 'Le mot de passe est obligatoire.',
            'project_id.required' => 'Veuillez sélectionner un projet.',
            'project_id.exists'   => 'Le projet sélectionné est invalide.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect.',
            ])->withInput($request->only('email', 'project_id'));
        }

        $request->session()->regenerate();

        /** @var User $user */
        $user = Auth::user();

        // Compte inactif
        if ($user->etat_utilisateur === 'inactif') {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Votre compte est inactif. Veuillez contacter l\'administrateur.',
            ])->withInput($request->only('email'));
        }

        // Vérifier que l'utilisateur est bien rattaché au projet choisi et que ce projet est actif
        $project = $user->projets()
            ->where('projects.id', $request->project_id)
            ->where('is_active', true)
            ->first();

        if (!$project) {
            Auth::logout();
            return back()->withErrors([
                'project_id' => 'Vous n\'êtes pas autorisé à accéder à ce projet.',
            ])->withInput($request->only('email', 'project_id'));
        }

        session([
            'selected_project_id'   => $project->id,
            'selected_project_name' => $project->nom_projet,
        ]);

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        session()->forget(['selected_project_id', 'selected_project_name']);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
                         ->with('success', 'Vous avez été déconnecté avec succès.');
    }
}