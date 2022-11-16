<?php

namespace Sun\LaravelEloquentFilter\Fields;

use Illuminate\Database\Eloquent\Builder;

class RelationSearchType extends AbstractSearchType
{
    public function __construct(
        string $relation,
        private SearchTypeInterface $searchType,
    ) {
        parent::__construct($relation);
    }

    public function configureBuilder(Builder $builder, string $criteria, mixed $value): void
    {
        $builder->whereHas($this->getField(), function (Builder $builder) use ($criteria, $value): void {
            $this->searchType->configureBuilder($builder, $criteria, $value);
        });
    }
}
