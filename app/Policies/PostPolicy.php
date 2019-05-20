<?php

namespace App\Policies;

use App\User;
use App\Post;
use App\Module;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function owner(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function subscribe(User $user, Module $module)
    {
        return count($user->modules->where('name', $module->name)) > 0;
    }
}
