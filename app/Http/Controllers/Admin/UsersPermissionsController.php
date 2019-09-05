<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersPermissionsController extends Controller
{
    public function store(Request $request)
    {
       $data = $request->validate([
           'name' => 'required',
           'guard_name' => 'required'
       ]); 

       $permission = Permission::create($data);

       return redirect()->route('admin.roles.create')->with('success', 'Se ha creado un nuevo permiso');
    }

    public function update(Request $request, User $user)
    {
        $user->permissions()->detach();

        if ($request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }

       return back()->with('success', 'Los permisos han sido actualizados');
    }
}
