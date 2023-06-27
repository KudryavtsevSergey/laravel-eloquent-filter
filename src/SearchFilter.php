<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter;

use Illuminate\Database\Eloquent\Builder;

interface SearchFilter
{
    public function applyFilters(Builder $builder): Builder;
}
