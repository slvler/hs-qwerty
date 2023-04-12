<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable()
    {
        static::saving(function ($model){
            static::unguarded(function () use ($model){
                $model->slug = Str::slug(static::getSlugFrom($model), static::getSLuggableSeperator($model));
            });
        });
    }
    protected static function getSlugFrom($model)
    {
        return $model->{$model->slugFrom ?? 'title'};
    }
    protected static function getSLuggableSeperator($model)
    {
        return $model->slugSeperator ?? '-';
    }

}
