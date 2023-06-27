<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Fields;

use Illuminate\Database\Eloquent\Builder;

interface CustomSearchTypeInterface
{
    public function configureBuilder(Builder $builder, array|bool|float|int|string|null $value): void;
}
