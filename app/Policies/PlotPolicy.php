<?php

namespace App\Policies;

use App\Models\Plot;
use App\Models\User;

class PlotPolicy
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
        if ($user->can('create plots')) {
            return true;
        }
    }

    public function update(User $user, Plot $plot)
    {
        if ($user->can('edit plots')) {
            return true;
        }
    }

    public function delete(User $user, Plot $plot)
    {
        if ($user->can('delete plots')) {
            return true;
        }
    }

}
