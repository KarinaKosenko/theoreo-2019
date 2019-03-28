<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    const ADMIN_PANEL = 'admin.admin_panel';
    const BRANDS_SECTION = 'admin.brands_section';
    const ACTIONS_SECTION = 'admin.actions_section';
    const CONTENT_MODERATION_SECTION = 'admin.content_moderation_section';
    const USERS_SECTION = 'admin.users_section';
    const QUERIES_SECTION = 'admin.queries_section';
    const LOGS_SECTION = 'admin.logs_section';


    public function adminPanel(User $user)
    {
        return in_array(self::ADMIN_PANEL, $user->permissions());
    }

    public function brands(User $user)
    {
        return in_array(self::BRANDS_SECTION, $user->permissions());
    }

    public function actions(User $user)
    {
        return in_array(self::ACTIONS_SECTION, $user->permissions());
    }

    public function moderation(User $user)
    {
        return in_array(self::CONTENT_MODERATION_SECTION, $user->permissions());
    }

    public function users(User $user)
    {
        return in_array(self::USERS_SECTION, $user->permissions());
    }

    public function queries(User $user)
    {
        return in_array(self::QUERIES_SECTION, $user->permissions());
    }

    public function logs(User $user)
    {
        return in_array(self::LOGS_SECTION, $user->permissions());
    }

}
