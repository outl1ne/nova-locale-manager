<?php

namespace OptimistDigital\NovaLocaleManager;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use OptimistDigital\NovaLocaleManager\Models\Locale;

class NovaLocaleManager extends Tool
{
    protected static $deleteCallback;
    protected static $locales;

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

    protected static function _getLocales()
    {
        if (isset(static::$locales)) return static::$locales;
        $locales = Locale
            ::orderBy('default', 'desc')
            ->get();
        static::$locales = $locales;
        return $locales;
    }

    public static function getLocales()
    {
        return static::_getLocales()
            ->pluck('name', 'locale')
            ->toArray();
    }

    public static function getLocalesFull()
    {
        return static::_getLocales()
            ->map(function ($locale) {
                return [
                    'name' => $locale->name,
                    'slug' => $locale->locale,
                    'default' => $locale->default,
                ];
            })
            ->toArray();
    }
}
