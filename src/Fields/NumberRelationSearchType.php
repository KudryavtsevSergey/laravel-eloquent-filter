<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Fields;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Exceptions\InternalError;
use Sun\LaravelEloquentFilter\Mapper\CriteriaDatabaseOperatorMapper;

class NumberRelationSearchType extends AbstractSearchType
{
    public function __construct(string $relation)
    {
        parent::__construct($relation);
    }

    public function configureBuilder(Builder $builder, string $criteria, Carbon|array|bool|float|int|string|null $value): void
    {
        if (!is_numeric($value)) {
            throw new InternalError('Value is not allowed for a filter by the number of relations');
        }
        $builder->has($this->getField(), CriteriaDatabaseOperatorMapper::map($criteria), (int)$value);
    }
}
