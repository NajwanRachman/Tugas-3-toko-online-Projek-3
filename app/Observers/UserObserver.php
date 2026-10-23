<?php

namespace App\Observers;

use App\Models\User;
use App\Models\RoleChangeLog;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    public function created(User $user): void
    {
        //
    }

    public function updated(User $user): void
    {
        // Catat hanya jika role benar-benar berubah.
        if (! $user->wasChanged('role')) {
            return;
        }

        RoleChangeLog::create([
            'target_user_id' => $user->id_user,
            'old_role' => $user->getOriginal('role'),
            'new_role' => $user->role,
            'actor_id' => Auth::id(),
        ]);
    }

    public function deleted(User $user): void
    {
        //
    }

    public function restored(User $user): void
    {
        //
    }

    public function forceDeleted(User $user): void
    {
        //
    }
}
