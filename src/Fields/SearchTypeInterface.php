<?php

namespace Sun\LaravelEloquentFilter\Fields;

use Illuminate\Database\Eloquent\Builder;

interface SearchTypeInterface
{
    public function configureBuilder(Builder $builder, string $criteria, mixed $value): void;
}
