<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'nom'              => 'ADMIN',
                'prenom'           => 'Test',
                'contact'          => '0000000000',
                'password'         => Hash::make('password'),
                'etat_utilisateur' => 'actif',
            ]
        );

        $user->syncRoles(['super-admin']);

        $role = Role::where('name', 'super-admin')->first();

       
        $projects = Project::where('nom_projet', 'like', 'Projet Démo%')->get();

        if ($role) {
            foreach ($projects as $project) {
                $user->projets()->syncWithoutDetaching([
                    $project->id => ['role_id' => $role->id],
                ]);
            }
        }
    }
}