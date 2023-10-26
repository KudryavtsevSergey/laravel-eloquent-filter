<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter;

use Sun\LaravelEloquentFilter\Enum\DeletableTypeEnum;

class SoftFilter
{
    public function __construct(
        private readonly string $deletableType = DeletableTypeEnum::ACTIVE,
    ) {
        DeletableTypeEnum::checkAllowedValue($deletableType);
    }

    public function getDeletableType(): string
    {
        return $this->deletableType;
    }
}
