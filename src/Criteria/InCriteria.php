<?php

namespace Sun\LaravelEloquentFilter\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Utils\CriteriaUtils;

class InCriteria implements CriteriaInterface
{
    public function __construct(
        private mixed $value,
        private string $fieldType,
    ) {
    }

    private function getFormattedValue(): array
    {
        return CriteriaUtils::formatValues($this->fieldType, (array)$this->value);
    }

    public function configureBuilder(Builder $builder, string $field): void
    {
        $builder->whereIn($field, $this->getFormattedValue());
    }
}
