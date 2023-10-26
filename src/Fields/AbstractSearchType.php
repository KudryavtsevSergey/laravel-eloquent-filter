<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Fields;

abstract class AbstractSearchType implements SearchTypeInterface
{
    public function __construct(
        private readonly string $field,
    ) {
    }

    protected function getField(): string
    {
        return $this->field;
    }
}
