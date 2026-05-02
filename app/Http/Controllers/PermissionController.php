<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
/*
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        Permission::create(['name' => $request->name]);

        return back()->with('success', 'Permission créée');
    }*/

    // ✅ LISTE
    public function index()
    {
        $permissions = Permission::orderBy('module')
            ->orderBy('name')
            ->get();

        return view('admin.permissions.index', compact('permissions'));
    }

    // ✅ FORM CREATE
    public function create()
    {
        return view('admin.permissions.create');
    }

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

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permission créée avec succès.');
    }

    // ✅ FORM EDIT
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permission'));
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
            ->route('permissions.index')
            ->with('success', 'Permission mise à jour.');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permission supprimée.');
    }
}
