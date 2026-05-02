<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
     public function create()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('admins.profilpermissions', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }

        /*return redirect()
            ->route('admins.profilpermissions')
            ->with('success', 'Rôle créé avec succès.');*/
             $roles = Role::orderBy('name')->get();

              $permissions = Permission::orderBy('module')
            ->orderBy('name')
            ->get();

        return view('admins.profilpermissions', compact('roles','permissions'));
    }

    public function edit($id)
{
    $role = Role::findOrFail($id);
    $permissions = Permission::all();

    return view('admins.profilpermissions', compact('role', 'permissions'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|unique:roles,name,' . $id,
        'permissions' => 'nullable|array'
    ]);

    $role = Role::findOrFail($id);

    $role->update([
        'name' => $request->name
    ]);

    $role->syncPermissions($request->permissions ?? []);

    //return redirect()->back()->with('success', 'Rôle modifié avec succès');

      $roles = Role::orderBy('name')->get();

              $permissions = Permission::orderBy('module')
            ->orderBy('name')
            ->get();

       return view('admins.profilpermissions', compact('roles', 'permissions'));
}


}
