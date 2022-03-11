<?php

namespace App\Observers;

use Debugbar;
use App\Models\Team;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {

        // assegna ruolo di dipendente solo nell'area di appartenenza

        if ($user?->team_id) {
            $teams = Team::all();
            foreach ($teams as $team) {
                $user->detachRole('dipendente', $team->id);
            }
            $user->attachRole('dipendente', $user->team_id);
        }
    }
}
