<?php

namespace App\Policies;

use App\Models\Ecosystem;
use App\Models\User;

class EcosystemPolicy
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
        if ($user->can('create ecosystems')) {
            return true;
        }
    }

    public function update(User $user, Ecosystem $ecosystem)
    {
        if ($user->can('edit ecosystems')) {
            return true;
        }
    }

    public function delete(User $user, Ecosystem $ecosystem)
    {
        if ($user->can('delete ecosystems')) {
            return true;
        }
    }

}
