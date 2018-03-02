<?php

namespace API\api;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__ . '/routers/routes.php');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
