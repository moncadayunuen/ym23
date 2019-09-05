<?php

namespace App\Policies;

use App\User;
use App\Career;
use Illuminate\Auth\Access\HandlesAuthorization;

class CareerPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->hasRole('Administrador'))
        {
            return true;
        }
    }

    public function view(User $user, Career $career)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Ver curriculum');
    }

    public function update(User $user, Career $career)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Editar curriculum');
    }
}
