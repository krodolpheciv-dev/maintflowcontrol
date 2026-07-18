<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Afficher la page de profil
     */
    public function index()
    {
        $user = Auth::user();
        $roles = \Spatie\Permission\Models\Role::all();
        $projects = \App\Models\Project::all();

        return view('accountusers.profile', compact('user', 'roles', 'projects'));
    }

    /**
     * Mettre à jour les informations personnelles
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'contact' => 'nullable|string|max:30',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'default')->withInput();
        }

        try {
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->contact = $request->contact;

            if ($request->hasFile('avatar')) {
                // Supprime l'ancien avatar s'il existe, via la façade Storage
                // (plus fiable que unlink/file_exists : gère les disques distants,
                // ne plante pas si le fichier a déjà été supprimé manuellement).
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }

                $path = $request->file('avatar')->store('avatars', 'public');
                $user->avatar = $path;
            }

            $user->save();

            return back()->with('success', 'Profil mis à jour avec succès !');

        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }

    /**
     * Mettre à jour le mot de passe
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('L\'ancien mot de passe est incorrect.');
                }
            }],
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required|string|min:8',
        ], [
            'current_password.required' => 'Veuillez entrer votre mot de passe actuel.',
            'new_password.required' => 'Veuillez entrer un nouveau mot de passe.',
            'new_password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'new_password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'default')->withInput();
        }

        try {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return back()->with('success', 'Mot de passe mis à jour avec succès !');

        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour du mot de passe.');
        }
    }

    /**
     * Mettre à jour les paramètres du compte
     */
    public function updateAccount(Request $request)
    {
        return back()->with('info', 'Les paramètres du compte sont à jour.');
    }
}