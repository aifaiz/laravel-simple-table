<?php 
namespace Aifaiz\SimpleTable;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class SimpleTableServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Load Views
        $this->loadViewsFrom(__DIR__ . '/View', 'simple-table');
    }

    public function boot()
    {
        // Register Blade component
        Blade::component('simple-table', \Aifaiz\SimpleTable\View\Components\SimpleTable::class);

        // Publish views
        $this->publishes([
            __DIR__ . '/View/simple-table.blade.php' => resource_path('views/vendor/simple-table/table.blade.php'),
        ], 'simple-table-views');
    }
}
