<?php

namespace App\Policies;

use App\Models\Zone;
use App\Models\User;

class ZonePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        if ($user->can('create zones')) {
            return true;
        }
    }

    public function update(User $user, Zone $zone)
    {
        if ($user->can('edit zones')) {
            return true;
        }
    }

    public function delete(User $user, Zone $zone)
    {
        if ($user->can('delete zones')) {
            return true;
        }
    }

}
