<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Administrador'))
        {
            return true;
        }
    }

    public function view(User $user, Project $project)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Ver proyectos');
    }

    public function create(User $user)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Crear proyectos');
    }

    public function update(User $user, Project $project)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Actualizar proyectos');
    }

    public function delete(User $user, Project $project)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar proyectos');
    }
}
