<?php

namespace DavidBase\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;

class LoginSuccessful
{
    /**
     * @param Login $event
     */
    public function handle(Login $event)
    {

        $user = $event->user;
        $user->last_login = Carbon::now();
        $user->save();

        activity('login')
            ->withProperties(['ip' => request()->ip()])
            ->log('Đăng nhập');
    }
}