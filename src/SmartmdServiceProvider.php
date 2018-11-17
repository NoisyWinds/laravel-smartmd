<?php

namespace NoisyWinds\Smartmd;

use Illuminate\Support\ServiceProvider;

class SmartmdServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadViewsFrom(__DIR__ . '/views', 'Smartmd');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/smartmd'),
            __DIR__.'/static' => public_path('vendor/laravel-smartmd'),
            __DIR__.'/config' => config_path('/'),
            __DIR__.'/Controller' => app_path('Http/Controllers/Smartmd'),
        ]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Smartmd', function ($app) {
            return new Smartmd($app['config']);
        });
    }
}
