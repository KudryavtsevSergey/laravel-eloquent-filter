<?php

namespace Sun\LaravelEloquentFilter\Fields;

abstract class AbstractSearchType implements SearchTypeInterface
{
    public function __construct(
        private string $field,
    ) {
    }

    protected function getField(): string
    {
        return $this->field;
    }
}
