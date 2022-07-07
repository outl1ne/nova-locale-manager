<?php

namespace Outl1ne\NovaLocaleManager;

use Outl1ne\NovaLocaleManager\Models\Locale;

class NovaLocaleManager
{
    protected static $deleteCallback;
    protected static $locales;

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
            $locales = static::getLocalesFull();
            $value = [];
            foreach ($locales as $locale) {
                $value[$locale['slug']] = $locale['name'];
            }
            return $value;
        });
    }

    public static function getLocalesFull()
    {
        return once(function () {
            return Locale::orderBy('default', 'desc')
                ->get()
                ->map(function ($locale) {
                    return [
                        'name' => $locale->name,
                        'active' => $locale->active,
                        'slug' => $locale->slug,
                        'default' => $locale->default,
                    ];
                })
                ->values()
                ->toArray();
        });
    }

    public static function getActiveLocales()
    {
        return once(function () {
            $locales = static::getActiveLocalesFull();

            $value = [];
            foreach ($locales as $locale) {
                $value[$locale['slug']] = $locale['name'];
            }
            return $value;
        });
    }

    public static function getActiveLocalesFull()
    {
        return once(function () {
            return array_values(array_filter(static::getLocalesFull(), function ($locale) {
                return $locale['active'];
            }));
        });
    }
}
