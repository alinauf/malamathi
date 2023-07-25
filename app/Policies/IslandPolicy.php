<?php

namespace App\Policies;

use App\Models\Island;
use App\Models\User;

class IslandPolicy
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
        if ($user->can('create islands')) {
            return true;
        }
    }

    public function update(User $user, Island $island)
    {
        if ($user->can('edit islands')) {
            return true;
        }
    }

    public function delete(User $user, Island $island)
    {
        if ($user->can('delete islands')) {
            return true;
        }
    }

}
