<?php

namespace DavidBase\ViewComposers;


use DavidBase\Events\SidebarBuildingEvent;
use Menu;

class BackendComposer
{
    public function compose()
    {
        Menu::make('sidebar', function ($menu) {
            event(new SidebarBuildingEvent($menu));
        })->filter( function ($item) {
            return empty($item->data('permission'))
                ? true
                : auth()->user()->hasAnyPermission(explode('|', $item->data('permission')));
        })->sortBy('order');
    }
}