<?php

namespace Sun\LaravelEloquentFilter;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @method static EloquentBuilder|QueryBuilder withTrashed(bool $withTrashed = true)
 * @method static EloquentBuilder|QueryBuilder onlyTrashed()
 * @method static EloquentBuilder|QueryBuilder withoutTrashed()
 */
interface SoftDeletableInterface
{
}
