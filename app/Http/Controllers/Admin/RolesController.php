<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Role);

        return view('admin.roles.index', [
            'roles' => Role::all(),
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    public function create()
    {
        $this->authorize('create', new Role);

        return view('admin.roles.create', [
            'role' => new Role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Role);

        $request->validate(
            ['name' => 'required|unique:roles'],
            [
                'name.required' => 'Es necesario escribir un nombre para el rol',
                'name.unique' => 'El nombre ya está en uso'
            ]
        ); 
 
        $role = new Role;
        $role->name = $request->input('name');
        $role->guard_name = 'web';
        $role->save();
        if ($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.index')->with('success', 'Se ha creado un nuevo role');
    }

    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $request->validate(
            ['name' => 'required', Rule::unique('roles')->ignore($role->id)],
            [
                'name.required' => 'Es necesario escribir un nombre para el rol',
                'name.unique' => 'El nombre ya está en uso'
            ]
        ); 
 
        $role->name = $request->input('name');
        $role->save();

        $role->permissions()->detach();
        
        if ($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.edit', $role)->with('success', 'Se ha actualizado el rol');
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Se ha eliminado un role');
    }
}
