<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Vider le cache Spatie
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

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
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(
                ['name' => $perm['name'], 'guard_name' => 'web'],
                ['module' => $perm['module']]
            );
        }

        // Rôle super-admin avec toutes les permissions
        $role = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $role->syncPermissions(Permission::all());

        // Rôle simple pour les utilisateurs standards
        Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}