<?php

namespace OptimistDigital\NovaLocaleManager\Nova\Resources;

use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use OptimistDigital\NovaLocaleManager\Models\Locale as LocaleModel;
use OptimistDigital\NovaLocaleManager\Nova\Actions\MakeLocaleDefault;

class Locale extends Resource
{
    public static $model = LocaleModel::class;
    public static $title = 'name';
    public static $search = ['name', 'locale'];
    public static $displayInNavigation = false;

    public function fields(Request $request)
    {
        return [
            Text::make('Name', 'name'),
            Text::make('Slug', 'slug')
                ->help('ISO-639'),
            Boolean::make('Default', 'default')
                ->exceptOnForms(),
            Boolean::make('Active', 'active'),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new MakeLocaleDefault,
        ];
    }
}
