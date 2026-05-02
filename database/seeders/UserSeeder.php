<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     // 🔹 1. Vider le cache Spatie
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 🔹 2. Supprimer toutes les permissions existantes
        Permission::query()->delete();

        // 🔹 3. Supprimer les rôles existants si tu veux repartir de zéro
        Role::query()->delete();

        $permissions = [
            // Module Utilisateurs
            ['name' => 'visualiser utilisateurs', 'module' => 'utilisateurs'],
            ['name' => 'creer utilisateurs', 'module' => 'utilisateurs'],
            ['name' => 'modifier utilisateurs', 'module' => 'utilisateurs'],
            ['name' => 'supprimer utilisateurs', 'module' => 'utilisateurs'],
            
            // Module Rôles
            ['name' => 'visualiser roles', 'module' => 'roles'],
            ['name' => 'creer roles', 'module' => 'roles'],
            ['name' => 'modifier roles', 'module' => 'roles'],
            ['name' => 'supprimer roles', 'module' => 'roles'],
            
            // Module Permissions
            ['name' => 'visualiser permissions', 'module' => 'permissions'],
            ['name' => 'creer permissions', 'module' => 'permissions'],
            ['name' => 'modifier permissions', 'module' => 'permissions'],
            ['name' => 'supprimer permissions', 'module' => 'permissions'],
            
            // Ajoute toutes tes permissions ici
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(
                ['name' => $perm['name'], 'guard_name' => 'web'],
                ['module' => $perm['module']]
            );
        }

        // Optionnel : assigner au super-admin
        $role = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $role->syncPermissions(Permission::all());

         // 🔹 6. Vider le cache Spatie encore une fois après tout
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
