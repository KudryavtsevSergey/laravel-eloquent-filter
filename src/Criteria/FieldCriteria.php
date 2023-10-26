<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Criteria;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Mapper\CriteriaDatabaseOperatorMapper;
use Sun\LaravelEloquentFilter\Utils\CriteriaUtils;

class FieldCriteria implements CriteriaInterface
{
    public function __construct(
        private readonly Carbon|bool|float|int|string|null $value,
        private readonly string $criteria,
        private readonly string $fieldType
    ) {
    }

    private function getFormattedValue(): string|int|bool|float|Carbon
    {
        return CriteriaUtils::formatValue($this->fieldType, $this->value);
    }

    public function configureBuilder(Builder $builder, string $field): void
    {
        $builder->where($field, CriteriaDatabaseOperatorMapper::map($this->criteria), $this->getFormattedValue());
    }
}
