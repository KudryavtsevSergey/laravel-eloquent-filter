<?php

namespace Sun\LaravelEloquentFilter\Components;

use Sun\LaravelEloquentFilter\Fields\FieldSearchType;

trait TimestampableFilterTrait
{
    use DatabaseFieldNameTrait;

    protected function getTimestampableFilterFields(): array
    {
        return [
            static::CREATED_AT => new FieldSearchType($this->getCreatedAtFieldName()),
            static::UPDATED_AT => new FieldSearchType($this->getUpdatedAtFieldName()),
        ];
    }

    private function getCreatedAtFieldName(): string
    {
        return $this->getDatabaseFieldName('created_at');
    }

    private function getUpdatedAtFieldName(): string
    {
        return $this->getDatabaseFieldName('updated_at');
    }
}
