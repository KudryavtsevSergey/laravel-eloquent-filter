<?php

namespace Sun\LaravelEloquentFilter\Criteria;

use Illuminate\Database\Eloquent\Builder;

interface CriteriaInterface
{
    public function configureBuilder(Builder $builder, string $field): void;
}
