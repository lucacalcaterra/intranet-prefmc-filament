<?php

namespace App\Observers;

use Debugbar;
use App\Models\Team;
use App\Models\User;
use robertogallea\LaravelCodiceFiscale\CodiceFiscale;

use function PHPUnit\Framework\isEmpty;

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

        // if (empty  ($user->codice_fiscale)  && (isset ($user->data_nascita) && isset($user->sesso))) {
        //     $user->codice_fiscale=CodiceFiscale::generate($user->name,$user->surname,$user->data_nascita,$user->citta_nascita,$user->sesso);
        //     $user->save();
        //     dd($user->codice_fiscale);
        // }
    }
}
