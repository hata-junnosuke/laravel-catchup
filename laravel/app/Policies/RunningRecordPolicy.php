<?php

namespace App\Policies;

use App\Models\RunningRecord;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RunningRecordPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the running record.
     */
    public function update(User $user, RunningRecord $runningRecord)
    {
        return $user->id === $runningRecord->user_id;
    }
} 