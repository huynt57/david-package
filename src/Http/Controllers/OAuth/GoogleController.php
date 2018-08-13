<?php

namespace DavidBase\Http\Controllers\OAuth;


class GoogleController extends SocialiteControllers
{
    /**
     * GoogleController constructor.
     * @param string $driver
     */
    public function __construct($driver = 'google')
    {
        parent::__construct($driver);
    }
}