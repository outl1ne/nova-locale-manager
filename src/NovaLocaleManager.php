<?php

namespace OptimistDigital\NovaLocaleManager;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaLocaleManager extends Tool
{
    protected static $deleteCallback;

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        // Nova::script('NovaLocaleManager', __DIR__ . '/../dist/js/tool.js');
        // Nova::style('NovaLocaleManager', __DIR__ . '/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('NovaLocaleManager::navigation');
    }

    public static function deleteCallback($deleteCallback)
    {
        self::$deleteCallback = $deleteCallback;
    }

    public static function getDeleteCallback()
    {
        return self::$deleteCallback;
    }
}
