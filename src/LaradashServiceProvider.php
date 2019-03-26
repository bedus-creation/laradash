<?php

namespace Aammui\Laradash;

use Illuminate\Support\ServiceProvider;

class LaradashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views/welcome', 'laradash');

        $this->publishes([
            __DIR__ . '/config/laradash.php' => config_path('laradash.php'),
            __DIR__ . '/database' => database_path('migrations'),
            __DIR__ . '/database' => database_path('migrations'),
            __DIR__ . '/resources/views/' => resource_path('/views/'),
            __DIR__ . '/resources/sass/' => resource_path('/sass/'),
            __DIR__ . '/resources/js/components' => resource_path('/js/components/'),
        ]);

        $this->publishes([
            __DIR__ . '/Model' => app_path('Model'),
            __DIR__ . '/Http/Controllers' => app_path('Http/Controllers/'),
            __DIR__ . '/Http/Resources' => app_path('Http/Resources/'),
        ]);

        $this->publishes([
            __DIR__ . '/public/laradash' => public_path('laradash'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/services.php',
            'services'
        );
    }
}
