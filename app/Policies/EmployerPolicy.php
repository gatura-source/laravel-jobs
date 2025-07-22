<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employer $employer): bool
    {
        return false;
    }
   public function create(User $user): bool
    {
        // Only allow users who don't already have an employer
        return $user->employer === null;
    }

    public function update(User $user, Employer $employer): bool
    {
        // Only allow the employer owner to update
        return $user->id === $employer->user_id;
    }


    /**
     * Determine whether the user can create models.
     */

    /**
     * Determine whether the user can update the model.
     */
    // public function update(User $user, Employer $employer): bool
    // {
    //     return $user->employer->user_id === $employer->id;
    // }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employer $employer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employer $employer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employer $employer): bool
    {
        return false;
    }
}
