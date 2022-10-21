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
        if ($this->app->runningInConsole()) {
            // Export the migration
            if (!class_exists('CreateWarehousesTable')) {
                $this->publishes([
                    __DIR__ . '\database\migrations\create_warehouses_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_warehouses_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
        }

    }
}
