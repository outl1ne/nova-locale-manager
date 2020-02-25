<?php

namespace OptimistDigital\NovaLocaleManager;

use Laravel\Nova\Nova;
use Illuminate\Support\ServiceProvider;
use OptimistDigital\NovaLocaleManager\Nova\Resources\Locale;

class ToolServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-locale-manager');

        // Register resource
        Nova::resources([Locale::class]);

        // Console only
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }
}
