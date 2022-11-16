<?php

namespace Sun\LaravelEloquentFilter\Components;

trait DatabaseFieldNameTrait
{
    protected abstract function getDatabaseEntityName(): string;

    private function getDatabaseFieldName(string $field): string
    {
        return sprintf('%s.%s', $this->getDatabaseEntityName(), $field);
    }
}
