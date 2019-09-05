<?php

namespace App\Policies;

use App\User;
use App\Post;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->hasRole('Administrador'))
        {
            return true;
        }
    }

    public function view(User $user, Post $post)
    {
        return $user->id == $post->user_id || $user->hasPermissionTo('Ver publicaciones');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear publicaciones');
    }

    public function update(User $user, Post $post)
    {
        return $user->id == $post->user_id || $user->hasPermissionTo('Actualizar publicaciones');
    }

    public function delete(User $user, Post $post)
    {
        return $user->id == $post->user_id || $user->hasPermissionTo('Eliminar publicaciones');
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
