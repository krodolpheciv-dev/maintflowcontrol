<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        if (Auth::check()) {
            if (session()->has('selected_project_id')) {
                return redirect()->route('dashboard');
            }
            return redirect()->route('select.project');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'L\'adresse email est obligatoire.',
            'email.email'       => 'Veuillez entrer une adresse email valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Vérifier si le compte est actif 
            if ($user->etat_utilisateur === 'inactif') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Votre compte est inactif. Veuillez contacter l\'administrateur.',
                ]);
            }

            // Récupérer les projets actifs de l'utilisateur
            /** @var User $user */
            $projets = $user->projets()
                ->where('is_active', true)
                ->get();

            if ($projets->isEmpty()) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Aucun projet actif n\'est associé à votre compte. Veuillez contacter l\'administrateur.',
                ]);
            }

            // Un seul projet -> sélection automatique
            if ($projets->count() === 1) {
                $project = $projets->first();
                session([
                    'selected_project_id'   => $project->id,
                    'selected_project_name' => $project->nom_projet,
                ]);
                return redirect()->intended(route('dashboard'));
            }

            // Plusieurs projets -> page de sélection
            return redirect()->route('select.project');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->withInput($request->only('email'));
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