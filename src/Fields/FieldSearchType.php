<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Fields;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Criteria\CriteriaCreator;
use Sun\LaravelEloquentFilter\Enum\FieldSearchTypeEnum;

class FieldSearchType extends AbstractSearchType
{
    public function __construct(
        string $field,
        private readonly string $fieldType = FieldSearchTypeEnum::STRING,
    ) {
        parent::__construct($field);
    }

    public function configureBuilder(Builder $builder, string $criteria, Carbon|array|bool|float|int|string|null $value): void
    {
        $fieldCriteria = CriteriaCreator::create($criteria, $value, $this->fieldType);
        $fieldCriteria->configureBuilder($builder, $this->getField());
    }
}
