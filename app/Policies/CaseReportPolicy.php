<?php

namespace App\Policies;

use App\Models\CaseReport;
use App\Models\User;

class CaseReportPolicy
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
        if ($user->can('create case reports')) {
            return true;
        }
    }

    public function update(User $user, CaseReport $caseReport)
    {
        if ($user->can('edit case reports')) {
            return true;
        }
    }

    public function delete(User $user, CaseReport $caseReport)
    {
        if ($user->can('delete case reports')) {
            return true;
        }
    }

    public function verify(User $user, CaseReport $caseReport)
    {
        if ($user->can('verify case reports')) {
            return true;
        }
    }

    public function unpublish(User $user, CaseReport $caseReport)
    {
        if ($user->can('unpublish case reports')) {
            return true;
        }
    }

}
