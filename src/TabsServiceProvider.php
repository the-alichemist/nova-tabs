<?php
namespace Eminiarts\Tabs;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class TabsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('tabs', __DIR__ . '/../dist/js/field.js');
            Nova::style('tabs', __DIR__ . '/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind our own FieldController in order to allow Tabs to get the correct fields from tabs
        $this->app->bind('Laravel\Nova\Http\Controllers\FieldController', 'Eminiarts\Tabs\FieldController');
    }
}
