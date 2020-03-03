<?php

namespace Digicraft\AirVisual;

use Illuminate\Support\ServiceProvider;

class AirVisualServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/airvisual.php', 'laralang');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/airvisual.php' => config_path('airvisual.php'),
        ], 'config');
    }
}
