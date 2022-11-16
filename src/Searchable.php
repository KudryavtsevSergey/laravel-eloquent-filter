<?php

namespace Sun\LaravelEloquentFilter;

class Searchable
{
    public function __construct(
        private array $search = [],
        private array $sortBy = [],
        private array $sortDesc = [],
    ) {
    }

    public function getSearch(): array
    {
        return $this->search;
    }

    public function replaceSearch(string $field, array $value): void
    {
        $this->search[$field] = $value;
    }

    public function getSortBy(): array
    {
        return $this->sortBy;
    }

    public function getSortDesc(): array
    {
        return $this->sortDesc;
    }
}
