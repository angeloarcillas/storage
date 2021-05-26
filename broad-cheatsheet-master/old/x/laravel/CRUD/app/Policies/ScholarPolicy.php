<?php

namespace App\Policies;

use App\Scholars;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScholarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any scholars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the scholars.
     *
     * @param  \App\User  $user
     * @param  \App\Scholars  $scholars
     * @return mixed
     */
    public function view(User $user,$verifyUser)
    {
         return $verifyUser->owner_id ==  $user->id;
    }

    /**
     * Determine whether the user can create scholars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the scholars.
     *
     * @param  \App\User  $user
     * @param  \App\Scholars  $scholars
     * @return mixed
     */
    public function update(User $user, Scholars $scholars)
    {
        //
    }

    /**
     * Determine whether the user can delete the scholars.
     *
     * @param  \App\User  $user
     * @param  \App\Scholars  $scholars
     * @return mixed
     */
    public function delete(User $user, Scholars $scholars)
    {
        //
    }

    /**
     * Determine whether the user can restore the scholars.
     *
     * @param  \App\User  $user
     * @param  \App\Scholars  $scholars
     * @return mixed
     */
    public function restore(User $user, Scholars $scholars)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the scholars.
     *
     * @param  \App\User  $user
     * @param  \App\Scholars  $scholars
     * @return mixed
     */
    public function forceDelete(User $user, Scholars $scholars)
    {
        //
    }
}
