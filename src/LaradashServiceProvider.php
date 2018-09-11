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
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/resources/views/welcome','laradash');

        $this->publishes([
            __DIR__.'/resources/views/' => resource_path('/views/'),            
            __DIR__.'/resources/sass/' => resource_path('/sass/'),            
            __DIR__.'/resources/js/components' => resource_path('/js/components/'),
        ]);

        $this->publishes([
            __DIR__.'/public/img/' => public_path('img'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
