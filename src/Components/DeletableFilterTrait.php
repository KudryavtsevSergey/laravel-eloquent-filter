<?php

namespace Sun\LaravelEloquentFilter\Components;

use Sun\LaravelEloquentFilter\Fields\FieldSearchType;

trait DeletableFilterTrait
{
    use DatabaseFieldNameTrait;

    protected function getDeletableFilterFields(): array
    {
        return [
            static::DELETED_AT => new FieldSearchType($this->getDeletedAtFieldName()),
        ];
    }

    private function getDeletedAtFieldName(): string
    {
        return $this->getDatabaseFieldName('deleted_at');
    }
}
