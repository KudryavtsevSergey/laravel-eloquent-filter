<?php

namespace Sun\LaravelEloquentFilter;

use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Enum\SortOrderEnum;
use Sun\LaravelEloquentFilter\Exceptions\InvalidValueException;
use Sun\LaravelEloquentFilter\Fields\CustomSearchTypeInterface;
use Sun\LaravelEloquentFilter\Fields\SearchTypeInterface;

abstract class AbstractSearchFilter implements SearchFilter
{
    public function __construct(
        private Searchable $searchable,
    ) {
    }

    public function replaceSearch(string $field, array $value): static
    {
        $this->searchable->replaceSearch($field, $value);
        return $this;
    }

    public function applyFilters(Builder $builder): Builder
    {
        $this->order($builder);
        $this->search($builder);
        return $builder;
    }

    private function order(Builder $builder): void
    {
        $sortOrder = $this->sortOrder();
        foreach ($sortOrder as $item) {
            $builder->orderBy($item['column'], $item['order']);
        }
    }

    private function sortOrder(): array
    {
        $sortBy = $this->searchable->getSortBy();
        $sortDesc = $this->searchable->getSortDesc();

        return array_map(static fn($order, $column): array => [
            'column' => $column,
            'order' => filter_var($order, FILTER_VALIDATE_BOOLEAN) ? SortOrderEnum::DESC : SortOrderEnum::ASC,
        ], $sortDesc, $sortBy);
    }

    private function search(Builder $builder): void
    {
        $search = $this->searchable->getSearch();
        foreach ($search as $searchKey => $values) {
            $customFilterField = $this->getCustomFilterField($searchKey);
            if ($customFilterField !== null) {
                $customFilterField->configureBuilder($builder, $values);
            } else {
                $filterField = $this->getFilterField($searchKey);

                foreach ($values as $criteria => $value) {
                    if ($value || is_bool($value) || is_int($value) || is_float($value)) {
                        $filterField->configureBuilder($builder, $criteria, $value);
                    }
                }
            }
        }
    }

    private function getCustomFilterField(string $searchKey): ?CustomSearchTypeInterface
    {
        if ($this instanceof CustomFilterInterface) {
            $customFilters = $this->getCustomFilters();
            return $customFilters[$searchKey] ?? null;
        }
        return null;
    }

    private function getFilterField(string $searchKey): SearchTypeInterface
    {
        $filterFields = $this->getFilterFields();
        if (is_null($filterField = $filterFields[$searchKey] ?? null)) {
            throw new InvalidValueException($searchKey, array_keys($filterFields));
        }
        return $filterField;
    }

    /**
     * @return SearchTypeInterface[]
     */
    protected abstract function getFilterFields(): array;
}
