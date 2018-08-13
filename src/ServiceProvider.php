<?php

namespace DavidBase;


use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use DavidBase\Console\Commands\InstallCommand;
use DavidBase\Http\Validators\CurrentPassword;
use DavidBase\Observers\UserObserver;
use Route;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use View;

class ServiceProvider extends EventServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'DavidBase\Listeners\LoginSuccessful',
        ],
        'DavidBase\Events\SidebarBuildingEvent' => [
            'DavidBase\Listeners\SidebarBuildingListener'
        ],
    ];

    /**
     * @return void
     */
    public function register()
    {
        $this->commands([
            InstallCommand::class
        ]);
    }

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Localization
        Carbon::setLocale(app()->getLocale());
        Carbon::setWeekStartsAt(1);
        $this->loadJsonTranslationsFrom(__DIR__.'../resources/lang');

        // Extend Validator
        Validator::extend('current_password', CurrentPassword::class);

        // Model Observers
        User::observe(UserObserver::class);

        // Map Routes
        $this->mapRoutes();

        // View Composers
        $this->viewComposers();

        // Publishing File Groups
        $this->publishFileGroups();
    }

    /**
     * @return void
     */
    protected function mapRoutes()
    {
        // Map web routes
        Route::middleware('web')
            ->namespace('DavidBase\Http\Controllers')
            ->group(__DIR__.'/routes/web.php');
    }

    /**
     * View Composers
     */
    protected function viewComposers()
    {
        View::composer('*', 'DavidBase\ViewComposers\AnyComposer');
        View::composer('layouts.admin', 'DavidBase\ViewComposers\BackendComposer');
        View::composer('home', 'DavidBase\ViewComposers\DashboardComposer');
        View::composer('users.form', 'DavidBase\ViewComposers\UserComposer');
        View::composer('roles.form', 'DavidBase\ViewComposers\RoleComposer');
    }

    /**
     * @return void
     */
    protected function publishFileGroups()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../migrations/'       => database_path('migrations')
            ], 'davidbase-migrations');

            $this->publishes([
                __DIR__.'/../config/'           => config_path(),
            ], 'davidbase-configs');

            $this->publishes([
                __DIR__.'/../resources/themes/' => resource_path('themes')
            ], 'davidbase-themes');

            $this->publishes([
                __DIR__.'/../public/'           => public_path()
            ], 'davidbase-assests');

            $this->publishes([
                __DIR__.'/../resources/lang'    => resource_path('lang')
            ], 'davidbase-lang');
        }
    }
}