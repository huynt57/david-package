<?php

namespace DavidBase\Http\Controllers\OAuth;


class FacebookController extends SocialiteControllers
{
    /**
     * FacebookController constructor.
     * @param $driver
     */
    public function __construct($driver = 'facebook')
    {
        parent::__construct($driver);
    }
}