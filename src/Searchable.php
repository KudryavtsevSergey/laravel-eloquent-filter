<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter;

class Searchable
{
    /**
     * @param array $search
     * @param Sortable[] $sort
     */
    public function __construct(
        private array $search = [],
        private array $sort = [],
    ) {
    }

    public function getSearch(): array
    {
        return $this->search;
    }

    public function replaceSearch(string $field, mixed $value): void
    {
        $this->search[$field] = $value;
    }

    public function getSort(): array
    {
        return $this->sort;
    }
}
