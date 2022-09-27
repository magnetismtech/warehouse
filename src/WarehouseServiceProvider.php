<?php

namespace Magnetism\Warehouse;

use Illuminate\Support\ServiceProvider;

class WarehouseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Magnetism\Warehouse\Http\WarehouseController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'./routes/web.php');
        $this->loadMigrationsFrom(__DIR__ .'/database/migrations');

    }
}
