<?php

namespace Sun\LaravelEloquentFilter\Criteria;

use Illuminate\Database\Eloquent\Builder;

class CallBackCriteria implements CriteriaInterface
{
    public function __construct(
        protected mixed $value,
        private string $criteria,
        private $callback,
        private string $fieldType,
    ) {
    }

    public function configureBuilder(Builder $builder, string $field): void
    {
        $callback = $this->callback;
        $callback($builder, $this->criteria, $this->value, $field, $this->fieldType);
    }
}
