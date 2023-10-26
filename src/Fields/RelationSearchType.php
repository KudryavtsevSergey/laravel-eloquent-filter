<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Fields;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class RelationSearchType extends AbstractSearchType
{
    public function __construct(
        string $relation,
        private readonly SearchTypeInterface $searchType,
    ) {
        parent::__construct($relation);
    }

    public function configureBuilder(Builder $builder, string $criteria, Carbon|array|bool|float|int|string|null $value): void
    {
        $builder->whereHas($this->getField(), function (Builder $builder) use ($criteria, $value): void {
            $this->searchType->configureBuilder($builder, $criteria, $value);
        });
    }
}
