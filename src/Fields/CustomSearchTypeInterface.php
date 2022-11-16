<?php

namespace Sun\LaravelEloquentFilter\Fields;

use Illuminate\Database\Eloquent\Builder;

interface CustomSearchTypeInterface
{
    public function configureBuilder(Builder $builder, mixed $value): void;
}
