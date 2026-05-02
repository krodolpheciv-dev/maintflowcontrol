<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreationpermissionController extends Controller
{
    //

    public function create()
{
    /*$permissions = Permission::orderBy('name')->get();*/
    $permissions = Permission::orderBy('module')
            ->orderBy('name')
            ->get();

      $roles = Role::orderBy('name')->get();

       

    return view('admins.profilpermissions', compact('permissions','roles'));
}

 // ✅ LISTE
    public function index()
    {
        $permissions = Permission::orderBy('module')
            ->orderBy('name')
            ->get();

        return view('admins.profilpermissions', compact('permissions'));
    }

  /*  // ✅ FORM CREATE
    public function create()
    {
        return view('admins.profilpermissions');
    }*/

    // ✅ STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
            'module' => 'required|string'
        ]);

        Permission::create([
            'name' => strtolower($request->name),
            'module' => strtolower($request->module),
            'guard_name' => 'web'
        ]);

       /* return redirect()
            ->route('admins.profilpermissions')
            ->with('success', 'Permission créée avec succès.');*/

              $permissions = Permission::orderBy('module')
            ->orderBy('name')
            ->get();

        return view('admins.profilpermissions', compact('permissions'));
    }

    // ✅ FORM EDIT
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admins.profilpermissions', compact('permission'));
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $permission->id,
            'module' => 'required|string'
        ]);

        $permission->update([
            'name' => strtolower($request->name),
            'module' => strtolower($request->module),
        ]);

        return redirect()
            ->route('admins.profilpermissions')
            ->with('success', 'Permission mise à jour.');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        /*return redirect()
            ->route('admins.profilpermissions')
            ->with('success', 'Permission supprimée.');*/

             $permissions = Permission::orderBy('module')
            ->orderBy('name')
            ->get();

        return view('admins.profilpermissions', compact('permissions'));
    }




    // ✅ DELETE - Supprimer une permission
public function destroysecond($id)
{
    try {
        $permission = Permission::findOrFail($id);
        
        // Vérifier si la permission est utilisée par des rôles
        if ($permission->roles()->count() > 0) {
            return redirect()
                ->route('admins.profilpermissions')
                ->with('error', 'Impossible de supprimer : cette permission est assignée à des rôles.');
        }
        
        $permission->delete();

        return redirect()
            ->route('admins.profilpermissions')
            ->with('success', 'Permission supprimée avec succès.');
            
    } catch (\Exception $e) {
        return redirect()
            ->route('admins.profilpermissions')
            ->with('error', 'Erreur lors de la suppression.');
    }
}

}
