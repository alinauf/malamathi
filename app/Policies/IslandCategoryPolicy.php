<?php

namespace App\Policies;

use App\Models\IslandCategory;
use App\Models\User;

class IslandCategoryPolicy
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
        if ($user->can('create island categories')) {
            return true;
        }
    }

    public function update(User $user, IslandCategory $islandCategory)
    {
        if ($user->can('edit island categories')) {
            return true;
        }
    }

    public function delete(User $user, IslandCategory $islandCategory)
    {
        if ($user->can('delete islands categories')) {
            return true;
        }
    }
}
