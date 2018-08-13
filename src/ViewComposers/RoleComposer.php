<?php

namespace DavidBase\ViewComposers;

use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class RoleComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('permissions', Permission::get());
    }
}