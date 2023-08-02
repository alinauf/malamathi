<?php

namespace App\Policies;

use App\Models\PlotUsage;
use App\Models\User;

class PlotUsagePolicy
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
        if ($user->can('create plot usages')) {
            return true;
        }
    }

    public function update(User $user, PlotUsage $plotUsage)
    {
        if ($user->can('edit plot usages')) {
            return true;
        }
    }

    public function delete(User $user, PlotUsage $plotUsage)
    {
        if ($user->can('delete plot usages')) {
            return true;
        }
    }

}
