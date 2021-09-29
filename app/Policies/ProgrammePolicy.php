<?php

namespace App\Policies;

use App\Models\Programme;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgrammePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user) : bool
    {
        return true;
    }

    /**
     * @param User $user
     * @param Programme $programme
     * @return bool
     */
    public function view(User $user, Programme $programme) : bool
    {
        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user) : bool
    {
        return $user->is_admin ?? false;
    }

    /**
     * @param User $user
     * @param Programme $programme
     * @return bool
     */
    public function update(User $user, Programme $programme) : bool
    {
        return $user->is_admin ?? false;
    }

    /**
     * @param User $user
     * @param Programme $programme
     * @return bool
     */
    public function delete(User $user, Programme $programme) : bool
    {
        return $user->is_admin ?? false;
    }

    /**
     * @param User $user
     * @param Programme $programme
     * @return bool
     */
    public function restore(User $user, Programme $programme) : bool
    {
        return $user->is_admin ?? false;
    }

    /**
     * @param User $user
     * @param Programme $programme
     * @return bool
     */
    public function forceDelete(User $user, Programme $programme) : bool
    {
        return $user->is_admin ?? false;
    }
}
