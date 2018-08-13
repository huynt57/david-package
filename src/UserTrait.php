<?php

namespace DavidBase;


use Potato\Filterable\Filterable;
use Spatie\Permission\Traits\HasRoles;

trait UserTrait
{
    use HasRoles;
    use Filterable;

    /**
     * @param $string
     */
    public function setPasswordAttribute($string)
    {
        $this->attributes['password'] = bcrypt($string);
    }
}