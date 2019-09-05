<?php

namespace App\Policies;

use App\User;
use App\CategoryProject;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryProjectPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->hasRole('Administrador'))
        {
            return true;
        }
    }

    public function view(User $user, CategoryProject $categoryProject)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Ver categorias de proyectos');
    }

    public function update(User $user, CategoryProject $categoryProject)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Editar categorias de proyectos');
    }

    public function delete(User $user, CategoryProject $categoryProject)
    {
        return $user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar categorias de proyectos');
    }

}
