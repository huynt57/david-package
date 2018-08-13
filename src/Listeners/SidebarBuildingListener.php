<?php

namespace DavidBase\Listeners;


use DavidBase\Events\SidebarBuildingEvent;

class SidebarBuildingListener
{
    /**
     * @param SidebarBuildingEvent $event
     */
    public function handle(SidebarBuildingEvent $event)
    {
        $sidebar = $event->sidebar;

        $sidebar->add(__('davidbase.sidebar.dashboard'), ['route' => 'home'])
            ->nickname('home')
            ->data('order', 0);

        $sidebar->home->prepend('<i class="fa fa-dashboard"></i>');

        $sidebar->raw(__('davidbase.sidebar.header.manage_system'), [
            'class' => 'header'
        ])->data('permission', 'manage-system')->data('order', 0);

        $sidebar->add(__('davidbase.sidebar.activities'), ['route' => 'activities.index'])
            ->nickname('activities')
            ->data('permission', 'manage-system')
            ->data('order', 0);

        $sidebar->activities->prepend('<i class="fa fa-history"></i>');

        $sidebar->raw(__('davidbase.sidebar.header.manage_users'), [
            'class' => 'header'
        ])->data('permission', 'manage-roles|browse-users')->data('order', 0);

        $sidebar->add(__('davidbase.sidebar.roles'), ['route' => 'roles.index'])
            ->nickname('roles')
            ->data('permission', 'manage-roles')
            ->data('order', 0);

        $sidebar->roles->prepend('<i class="fa fa-users"></i>');

        $sidebar->add(__('davidbase.sidebar.users'), ['route' => 'users.index'])
            ->nickname('users')
            ->data('permission', 'browse-users')
            ->data('order', 0);

        $sidebar->users->prepend('<i class="fa fa-user"></i>');
    }
}