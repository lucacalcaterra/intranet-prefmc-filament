<?php

namespace App\Policies;

use App\Models\Ufficio;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UfficioPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Ufficio  $ufficio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Ufficio $ufficio)
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
     * @param  \App\Models\Ufficio  $ufficio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ufficio $ufficio)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Ufficio  $ufficio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ufficio $ufficio)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Ufficio  $ufficio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ufficio $ufficio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Ufficio  $ufficio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ufficio $ufficio)
    {
        //
    }
}
