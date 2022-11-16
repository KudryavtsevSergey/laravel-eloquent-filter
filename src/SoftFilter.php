<?php

namespace Sun\LaravelEloquentFilter;

use Sun\LaravelEloquentFilter\Enum\DeletableTypeEnum;

class SoftFilter
{
    public function __construct(
        private string $deletableType = DeletableTypeEnum::ACTIVE,
    ) {
    }

    public function getDeletableType(): string
    {
        return $this->deletableType;
    }
}
