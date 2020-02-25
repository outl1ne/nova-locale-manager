<?php

namespace OptimistDigital\NovaLocaleManager;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use OptimistDigital\NovaLocaleManager\Models\Locale;

class NovaLocaleManager extends Tool
{
    protected static $deleteCallback;
    protected static $locales;

    public function renderNavigation()
    {
        return view('nova-locale-manager::navigation');
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
