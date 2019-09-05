<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->hasRole('Administrador'))
        {
            return true;
        }
    }

    public function view(User $user, Category $category)
    {
        return $user->hasPermissionTo('Ver categorías');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear categorías');
    }

    public function update(User $user, Category $category)
    {
        return $user->hasPermissionTo('Actualizar categorías');
    }

    public function delete(User $user, Category $category)
    {
        return $user->hasPermissionTo('Eliminar categorías');
    }

    /**
     * Determine whether the user can restore the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function restore(User $user, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function forceDelete(User $user, Category $category)
    {
        //
    }
}
