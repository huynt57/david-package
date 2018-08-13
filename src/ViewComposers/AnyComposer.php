<?php

namespace DavidBase\ViewComposers;


use Illuminate\View\View;

class AnyComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with([
            'authUser' => auth()->user(),
            'routeName'=> is_null(request()->route()) ?: request()->route()->getName()
        ]);
    }
}