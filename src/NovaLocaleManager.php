<?php

namespace OptimistDigital\NovaLocaleManager;

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

    public static function getLocales()
    {
        return once(function () {
            return Locale::orderBy('default', 'desc')
                ->pluck('name', 'locale')
                ->toArray();
        });
    }

    public static function getLocalesFull()
    {
        return array_map(function ($locale) {
            return [
                'name' => $locale->name,
                'slug' => $locale->slug,
                'default' => $locale->default,
            ];
        }, static::getLocales());
    }
}
