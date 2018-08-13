<?php

namespace DavidBase\ViewComposers;


use Illuminate\View\View;
use DavidBase\Events\DashboardBuildingEvent;

class DashboardComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $elements = collect();
        event(new DashboardBuildingEvent($elements));
        $view->with('elements', $elements);
    }
}