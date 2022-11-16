<?php

namespace Sun\LaravelEloquentFilter;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method Builder filter(SearchFilter $filters)
 */
trait SearchableTrait
{
    public function scopeFilter(Builder $builder, SearchFilter $filters): Builder
    {
        return $filters->applyFilters($builder);
    }
}
