<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $roles = Role::orderBy('name')->get();
        $projects = Project::latest()->get();
        return view('admins.membershiplist', compact('users', 'roles', 'projects'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|string|max:50',
            'role_global' => 'required|string|exists:roles,name',
            'projets' => 'required|array',
            'projets.*' => 'required|exists:projects,id',
        ]);

        // Démarrer une transaction pour pouvoir annuler en cas d'erreur
        \DB::beginTransaction();

        try {
            $password = Str::random(8);
            
            // Créer l'utilisateur
            $user = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'contact' => $request->contact,
                'etat_utilisateur' => 'actif',
                'password' => Hash::make($password),
            ]);

            // Assigner le rôle global
            $user->syncRoles([$request->role_global]);

            // Assigner les projets avec leurs rôles
            foreach ($request->projets as $projetId => $roleId) {
                $user->projets()->syncWithoutDetaching([
                    $projetId => ['role_id' => $roleId]
                ]);
            }

            // Générer le token pour le reset de mot de passe
            $token = Password::createToken($user);

            // TENTATIVE D'ENVOI D'EMAIL - Si échec, on annule tout
            try {
                Mail::to($user->email)->send(new UserCreatedMail($user, $token));
                Log::info('Email envoyé avec succès à : ' . $user->email);
            } catch (\Exception $mailError) {
                // L'email a échoué, on annule la transaction
                Log::error('ÉCHEC ENVOI EMAIL - Annulation création : ' . $mailError->getMessage());
                throw new \Exception('Impossible d\'envoyer l\'email de création. Vérifiez votre configuration mail.');
            }

            // Tout ok, on valide la transaction
            \DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Utilisateur créé avec succès. Un email de bienvenue a été envoyé.',
                'user' => $user
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \DB::rollBack();
            Log::error('Erreur validation : ' . json_encode($e->errors()));
            return response()->json([
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error('Erreur création utilisateur : ' . $e->getMessage());
            
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'La création du compte a échoué. Veuillez réessayer.'
            ], 500);
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'contact' => 'required|string|max:50',
                'role_global' => 'required|string|exists:roles,name',
                'projets' => 'nullable|array',
                'projets.*' => 'exists:projects,id',
            ]);

            $user->update($request->only(['nom', 'prenom', 'email', 'contact']));
            $user->syncRoles([$request->role_global]);

            $syncData = [];
            if ($request->filled('projets')) {
                foreach ($request->projets as $projetId => $roleId) {
                    $syncData[$projetId] = ['role_id' => $roleId];
                }
            }
            $user->projets()->sync($syncData);

            return response()->json([
                'success' => true,
                'message' => 'Utilisateur mis à jour avec succès !'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Erreur modification utilisateur : ' . $e->getMessage());
            return response()->json([
                'error' => 'Une erreur est survenue : ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit(User $user)
    {
        $user->load('projets');
        return response()->json([
            'id' => $user->id,
            'nom' => $user->nom,
            'prenom' => $user->prenom,
            'email' => $user->email,
            'contact' => $user->contact,
            'role_global' => $user->getRoleNames()->first(),
            'projets' => $user->projets->map(function ($p) {
                return [
                    'id' => $p->id,
                    'nom_projet' => $p->nom_projet,
                    'role_id' => $p->pivot->role_id
                ];
            }),
        ]);
    }
}