<?php

namespace DavidBase\Filters;

use Potato\Filterable\QueryFilters;

class UserFilters extends QueryFilters
{
    /**
     * @param $email
     * @return mixed
     */
    public function email($email)
    {
        return $this->builder->whereEmail($email);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function name($name)
    {
        return $this->builder->where('name', 'LIKE', "%$name%");
    }

    /**
     * @param $boolean
     * @return mixed
     */
    public function active($boolean)
    {
        return $this->builder->whereActive($boolean);
    }

}