<?php

namespace App\Policies;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Administrador'))
        {
            return true;
        }
    }

    public function view(User $user, Role $role)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Ver roles');
    }

    public function create(User $user)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Crear roles');
    }

    public function update(User $user, Role $role)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Actualizar roles');
    }

    public function delete(User $user, Role $role)
    {
        if ($role->id === 1)
        {
            $this->deny('No se puede eliminar este rol');
        }

        return $user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar roles');
    }

    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
