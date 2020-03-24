<?php

namespace App\Broadcasting;

use App\Salon;
use App\User;

class SalonChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //TODO add security check (user has to be in the salon)
        return true;
    }
}
