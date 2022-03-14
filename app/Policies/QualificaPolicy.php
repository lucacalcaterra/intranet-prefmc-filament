<?php

namespace App\Policies;

use App\Models\Qualifica;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class QualificaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return ($user->hasRole('superadministrator'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Qualifica  $qualifica
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Qualifica $qualifica)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Qualifica  $qualifica
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Qualifica $qualifica)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Qualifica  $qualifica
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Qualifica $qualifica)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Qualifica  $qualifica
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Qualifica $qualifica)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Qualifica  $qualifica
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Qualifica $qualifica)
    {
        //
    }
}
