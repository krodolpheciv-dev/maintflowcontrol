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

class UserController extends Controller
{
    //


     public function index()
    {
        $users = User::latest()->get();
        $roles = Role::orderBy('name')->get();
        $projects = Project::latest()->get();
        return view('admins.membershiplist', compact('users','roles','projects'));
    }




public function store(Request $request)
{
 /*   $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'contact' => 'nullable|string',
        'projet_id' => 'nullable|integer|exists:projects,id',
        'role' => 'required|exists:roles,name',
    ]);

    $temporaryPassword = Str::random(12);

    $user = User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'contact' => $request->contact,
        'projet_id' => $request->projet_id,
        'etat_utilisateur' => 'actif',
        'password' => Hash::make($temporaryPassword),
    ]);

    // 🎯 ASSIGNATION ROLE
    $user->assignRole($request->role);

    // Générer token reset
    $token = Password::createToken($user);

    Mail::to($user->email)->send(
        new UserCreatedMail($user, $token)
    );

    return back()->with('success', 'Utilisateur créé avec rôle assigné.');*/

    try{

     $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email',
        'contact' => 'required',
        'projets.*' => 'required|exists:roles,id',
        'role_global' => 'required|string', // rôle global
        'projets' => 'required|array'
    ]);

      //dd($request->all());

   /*   return response()->json([
    'debug' => $request->all()
]);*/

    $user = User::where('email', $request->email)->first();

    $newUser = false;

    if (!$user) {

        $password = Str::random(8);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'etat_utilisateur' => 'actif',
            'password' => Hash::make($password),
        ]);

        $newUser = true;
    }

    // 🎯 Affecter le rôle global avec Spatie
    $user->syncRoles([$request->role_global]);

    foreach ($request->projets as $projetId => $roleId) {

        $user->projets()->syncWithoutDetaching([
            $projetId => ['role_id' => $roleId]
        ]);
    }

    // Email
   /* if ($newUser) {
        Mail::to($user->email)->send(new NewUserMail($user));
    } else {
        Mail::to($user->email)->send(new AddedToProjectMail($user));
    }*/
 $token = Password::createToken($user);


if ($newUser) {


    Mail::to($user->email)->send(
        new UserCreatedMail($user, $token)
    );
} else {
       // Mail::to($user->email)->send(new AddedToProjectMail($user));

       
    Mail::to($user->email)->send(
        new UserCreatedMail($user, $token)
    );
    }

   // return back()->with('success', 'Utilisateur enregistré avec succès');
return response()->json([
    'success' => true,
    'message' => 'Utilisateur enregistré avec succès'
]);

        } catch (\Illuminate\Validation\ValidationException $e) {
        // Erreurs de validation
          return response()->json([
            'errors' => $e->errors()
        ], 422);

    } catch (\Exception $e) {
        // Erreurs générales
        \Log::error('Erreur création utilisateur : '.$e->getMessage());
        

        return response()->json([
            'error' => 'Une erreur est survenue '.$e->getMessage()
        ], 500);
    }
}


public function update(Request $request, User $user)
{
    try {

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'contact' => 'required',
            'role_global' => 'required',
            'projets' => 'nullable|array'
        ]);

        $user->update($request->only(['nom','prenom','email','contact']));

        $user->syncRoles([$request->role_global]);

        $syncData = [];

        if ($request->filled('projets')) {

            foreach ($request->projets as $projetId => $roleId) {

                $syncData[$projetId] = ['role_id' => $roleId];

            }

        }

        $user->projets()->sync($syncData);

        return response()->json([
            'success' => 'Utilisateur mis à jour avec succès !'
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {

        return response()->json([
            'errors' => $e->errors()
        ], 422);

    } catch (\Exception $e) {

        \Log::error('Erreur modification utilisateur : '.$e->getMessage());

        return response()->json([
            'errors' => 'Une erreur est survenue '.$e->getMessage()
        ], 500);
    }
}

/*public function update(Request $request, User $user)
{

    try{

    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'contact' => 'required',
        'role_global' => 'required',
        'projets' => 'nullable|array'
    ]);

    $user->update($request->only(['nom','prenom','email','contact']));
      
    $user->syncRoles([$request->role_global]);

    if ($request->projets) {
    // Mise à jour projets
    //dd($request->projets);
    foreach ($request->projets as $projetId => $roleId) {
        $user->projets()->syncWithoutDetaching([
            $projetId => ['role_id' => $roleId]
        ]);
    }
        return response()->json(['success' => 'Utilisateur mis à jour avec succès !']);

    }

  

       } catch (\Illuminate\Validation\ValidationException $e) {
        // Erreurs de validation
          return response()->json([
            'errors' => $e->errors()
        ], 422);

    } catch (\Exception $e) {
        // Erreurs générales
        \Log::error('Erreur création utilisateur : '.$e->getMessage());
        

        return response()->json([
            'errors' => 'Une erreur est survenue '.$e->getMessage()
        ], 500);
    }
}*/

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
        'projets' => $user->projets->map(function($p){
            return [
                'id' => $p->id,
                'nom_projet' => $p->nom_projet,
                'role_id' => $p->pivot->role_id
            ];
        }),
    ]);
}

}
