<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    

    public function before($user)
    {
        if ($user->hasRole('Administrador'))
        {
            return true;
        }
    }

    public function view(User $authUser, User $model)
    {
        return $authUser->id == $model->user_id || $model->hasPermissionTo('Ver usuarios');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear usuarios');
    }

    public function update(User $authUser, User $model)
    {
        return $authUser->id == $model->user_id || $model->hasPermissionTo('Actualizar usuarios');
    }

    public function delete(User $user, User $model)
    {
        return $authUser->id == $model->user_id || $model->hasPermissionTo('Eliminar usuarios');
    }

    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
}
