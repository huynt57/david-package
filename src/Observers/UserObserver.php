<?php

namespace davidbase\Observers;


use App\User;

class UserObserver
{
    /**
     * @param User $user
     */
    public function creating(User $user)
    {
        $user->setAttribute('avatar', config('davidbase.default_user_image'));
    }
}