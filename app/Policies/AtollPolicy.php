<?php

namespace App\Policies;

use App\Models\Atoll;
use App\Models\User;

class AtollPolicy
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
        if ($user->can('create atolls')) {
            return true;
        }
    }

    public function update(User $user, Atoll $atoll)
    {
        if ($user->can('edit atolls')) {
            return true;
        }
    }

    public function delete(User $user, Atoll $atoll)
    {
        if ($user->can('delete atolls')) {
            return true;
        }
    }

}
