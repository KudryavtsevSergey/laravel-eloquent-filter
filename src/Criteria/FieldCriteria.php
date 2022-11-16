<?php

namespace Sun\LaravelEloquentFilter\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Mapper\CriteriaDatabaseOperatorMapper;
use Sun\LaravelEloquentFilter\Utils\CriteriaUtils;

class FieldCriteria implements CriteriaInterface
{
    public function __construct(
        private mixed $value,
        private string $criteria,
        private string $fieldType
    ) {
    }

    private function getFormattedValue(): mixed
    {
        return CriteriaUtils::formatValue($this->fieldType, $this->value);
    }

    public function configureBuilder(Builder $builder, string $field): void
    {
        $builder->where($field, $this->getOperator(), $this->getFormattedValue());
    }

    protected function getOperator(): string
    {
        return CriteriaDatabaseOperatorMapper::map($this->criteria);
    }
}
