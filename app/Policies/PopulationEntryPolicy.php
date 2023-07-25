<?php

namespace App\Policies;

use App\Models\PopulationEntry;
use App\Models\User;

class PopulationEntryPolicy
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
        if ($user->can('create population entry')) {
            return true;
        }
    }

    public function update(User $user, PopulationEntry $populationEntry)
    {
        if ($user->can('edit population entry')) {
            return true;
        }
    }

    public function delete(User $user, PopulationEntry $populationEntry)
    {
        if ($user->can('delete population entry')) {
            return true;
        }
    }
}
