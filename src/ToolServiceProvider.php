<?php

namespace OptimistDigital\NovaLocaleManager;

use Laravel\Nova\Nova;
use Illuminate\Support\ServiceProvider;
use OptimistDigital\NovaLocaleManager\Nova\Locale;

class ToolServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'NovaLocaleManager');

        Nova::resources([
            Locale::class
        ]);

        // Console only
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }
}
