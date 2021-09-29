<?php

namespace App\Policies;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChannelPolicy
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
     * @param Channel $channel
     * @return bool
     */
    public function view(User $user, Channel $channel) : bool
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
     * @param Channel $channel
     * @return bool
     */
    public function update(User $user, Channel $channel) : bool
    {
        return $user->is_admin ?? false;
    }

    /**
     * @param User $user
     * @param Channel $channel
     * @return bool
     */
    public function delete(User $user, Channel $channel) : bool
    {
        return $user->is_admin ?? false;
    }

    /**
     * @param User $user
     * @param Channel $channel
     * @return bool
     */
    public function restore(User $user, Channel $channel) : bool
    {
        return $user->is_admin ?? false;
    }

    /**
     * @param User $user
     * @param Channel $channel
     * @return bool
     */
    public function forceDelete(User $user, Channel $channel) : bool
    {
        return $user->is_admin ?? false;
    }
}
