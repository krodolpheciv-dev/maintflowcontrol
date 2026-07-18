<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role;
use Throwable;

class RegisterController extends Controller
{
    public function showForm()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom'        => 'required|string|max:100',
            'prenom'     => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email',
            'contact'    => 'required|string|max:30',
            'password'   => 'required|string|min:8|confirmed',
            'conditions' => 'accepted',
        ], [
            'nom.required'        => 'Le nom est obligatoire.',
            'prenom.required'     => 'Le prénom est obligatoire.',
            'email.required'      => 'L\'adresse email est obligatoire.',
            'email.email'         => 'Veuillez entrer une adresse email valide.',
            'email.unique'        => 'Cette adresse email est déjà utilisée.',
            'contact.required'    => 'Le numéro de contact est obligatoire.',
            'password.required'   => 'Le mot de passe est obligatoire.',
            'password.min'        => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed'  => 'Les mots de passe ne correspondent pas.',
            'conditions.accepted' => 'Vous devez accepter les conditions d\'utilisation.',
        ]);

        try {
            $user = User::create([
                'nom'              => strtoupper($request->nom),
                'prenom'           => ucfirst(strtolower($request->prenom)),
                'email'            => strtolower($request->email),
                'contact'          => $request->contact,
                'password'         => Hash::make($request->password),
                'etat_utilisateur' => 'actif',
            ]);

            $role = Role::firstOrCreate(['name' => 'user']);
            $user->assignRole($role);

            event(new Registered($user));

            return redirect()
                ->route('login')
                ->with('success', 'Votre compte a été créé avec succès. Un administrateur doit maintenant vous affecter à un projet avant votre première connexion.');

        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la création du compte. Veuillez réessayer.');
        }
    }
}