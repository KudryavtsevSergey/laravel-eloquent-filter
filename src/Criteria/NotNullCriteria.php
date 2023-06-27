<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Criteria;

use Illuminate\Database\Eloquent\Builder;

class NotNullCriteria implements CriteriaInterface
{
    public function configureBuilder(Builder $builder, string $field): void
    {
        $builder->whereNotNull($field);
    }
}
