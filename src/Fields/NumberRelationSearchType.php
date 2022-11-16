<?php

namespace Sun\LaravelEloquentFilter\Fields;

use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Mapper\CriteriaDatabaseOperatorMapper;

class NumberRelationSearchType extends AbstractSearchType
{
    public function __construct(string $relation)
    {
        parent::__construct($relation);
    }

    public function configureBuilder(Builder $builder, string $criteria, mixed $value): void
    {
        $formattedValue = filter_var($value, FILTER_VALIDATE_INT);
        $operator = CriteriaDatabaseOperatorMapper::map($criteria);
        $builder->has($this->getField(), $operator, $formattedValue);
    }
}
