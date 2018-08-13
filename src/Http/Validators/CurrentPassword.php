<?php

namespace DavidBase\Http\Validators;


use Illuminate\Support\Facades\Hash;

class CurrentPassword
{
    /**
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @return mixed
     */
    public function validate($attribute, $value, $parameters, $validator)
    {
        return Hash::check($value, auth()->user()->getAuthPassword());
    }
}