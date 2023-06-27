<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter;

interface CustomFilterInterface
{
    public function getCustomFilters(): array;
}
