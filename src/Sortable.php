<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter;

use Sun\LaravelEloquentFilter\Constant\SortOrderConstant;

class Sortable
{
    public function __construct(
        private string $column,
        private bool $sortDesc,
    ) {
    }

    public function getColumn(): string
    {
        return $this->column;
    }

    public function getDirection(): string
    {
        return $this->sortDesc ? SortOrderConstant::DESC : SortOrderConstant::ASC;
    }
}
