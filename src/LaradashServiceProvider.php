<?php

namespace Aammui\Laradash;

use Illuminate\Support\ServiceProvider;
use Aammui\Laradash\Laradash;

class LaradashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laradash.php' => config_path('laradash.php'),
            __DIR__ . '/database' => database_path('migrations'),
            __DIR__ . '/database' => database_path('migrations'),
            __DIR__ . '/resources/views/' => resource_path('/views/'),
            __DIR__ . '/resources/sass/' => resource_path('/sass/'),
            __DIR__ . '/resources/js/components' => resource_path('/js/components/'),
        ]);

        $this->publishes([
            __DIR__ . '/Models' => app_path('Models'),
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
        $this->app->bind('Laradash', function () {
            return new Laradash();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/config/services.php',
            'services'
        );
    }
}
