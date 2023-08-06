<?php

namespace App\Policies;

use App\Models\CaseReportLink;
use App\Models\User;

class CaseReportLinkPolicy
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
        if ($user->can('create case report links')) {
            return true;
        }
    }

    public function update(User $user, CaseReportLink $caseReportLink)
    {
        if ($user->can('edit case report links')) {
            return true;
        }
    }

    public function delete(User $user, CaseReportLink $caseReportLink)
    {
        if ($user->can('delete case report links')) {
            return true;
        }
    }

}
