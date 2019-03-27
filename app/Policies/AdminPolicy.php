<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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

    public function login(User $user)
    {
        return in_array('admin.admin_panel', $user->permissions());
    }

    public function brands(User $user)
    {
        return in_array('admin.brands_section', $user->permissions());
    }

    public function actions(User $user)
    {
        return in_array('admin.actions_section', $user->permissions());
    }

    public function moderation(User $user)
    {
        return in_array('admin.content_moderation_section', $user->permissions());
    }

    public function users(User $user)
    {
        return in_array('admin.users_section', $user->permissions());
    }

    public function queries(User $user)
    {
        return in_array('admin.queries_section', $user->permissions());
    }

    public function logs(User $user)
    {
        return in_array('admin.brands_section', $user->permissions());
    }

}
