<?php

namespace DavidBase\ViewComposers;


use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with([
            'roles'       => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }
}