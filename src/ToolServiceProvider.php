<?php

namespace OptimistDigital\NovaLocaleManager;

use Laravel\Nova\Nova;
use Illuminate\Support\ServiceProvider;
use OptimistDigital\NovaLocaleManager\Nova\Resources\Locale;

class ToolServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-locale-manager');
        $this->publishes([__DIR__ . '/../config/nova-locale-manager.php' => config_path('nova-locale-manager.php')], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../config/nova-locale-manager.php', 'nova-locale-manager');

        // Register resource
        Nova::resources([Locale::class]);
    }
}
