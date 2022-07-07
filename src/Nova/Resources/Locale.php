<?php

namespace OptimistDigital\NovaLocaleManager\Nova\Resources;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\NovaLocaleManager\Models\Locale as LocaleModel;
use OptimistDigital\NovaLocaleManager\Nova\Actions\MakeLocaleDefault;
use OptimistDigital\NovaLocaleManager\Nova\Actions\ToggleLocaleActive;

class Locale extends Resource
{
    public static $model = LocaleModel::class;
    public static $title = 'name';
    public static $search = ['name', 'slug'];

    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Locale', function ($model) {
                $defaultSvg = $model->default ? "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" aria-labelledby=\"check-circle\" role=\"presentation\" class=\"fill-current ml-2 text-success\"><path d=\"M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z\"></path></svg>" : '';
                return "<div class='flex align-center'><span style='line-height: 22px;'><b>{$model->name}</b> ({$model->slug})</span>${defaultSvg}</div>";
            })
                ->asHtml()
                ->onlyOnIndex(),

            Text::make('Name', 'name')->hideFromIndex(),

            Text::make('Slug', 'slug')
                ->help('ISO-639')
                ->hideFromIndex(),

            Boolean::make('Default', 'default')
                ->hideFromIndex(),

            Boolean::make('Active', 'active'),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            new MakeLocaleDefault,
            new ToggleLocaleActive,
        ];
    }
}
