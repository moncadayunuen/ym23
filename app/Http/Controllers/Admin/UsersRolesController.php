<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersRolesController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->roles()->detach();

        if ($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }

       return redirect()->route('admin.users.edit', $user)->with('success', 'Los Roles han sido actualizados');
    }
}
