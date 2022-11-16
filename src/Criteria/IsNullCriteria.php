<?php

namespace Sun\LaravelEloquentFilter\Criteria;

use Illuminate\Database\Eloquent\Builder;

class IsNullCriteria implements CriteriaInterface
{
    public function configureBuilder(Builder $builder, string $field): void
    {
        $builder->whereNull($field);
    }
}
