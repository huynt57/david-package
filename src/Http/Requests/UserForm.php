<?php

namespace DavidBase\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

abstract class UserForm extends FormRequest
{
    /**
     * @return array|mixed
     */
    protected function getRoles()
    {
        return $this->has('roles')
            ? $this->get('roles')
            : [];
    }

    /**
     * @return array|mixed
     */
    protected function getDirectPermissions()
    {
        return $this->has('permissions')
            ? $this->get('permissions')
            : [];
    }
}