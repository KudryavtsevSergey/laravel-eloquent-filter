<?php

namespace Sun\LaravelEloquentFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sun\LaravelEloquentFilter\Components\DeletableFilterInterface;
use Sun\LaravelEloquentFilter\Components\DeletableFilterTrait;
use Sun\LaravelEloquentFilter\Enum\DeletableTypeEnum;

abstract class AbstractTimestampSoftSearchFilter extends AbstractTimestampSearchFilter implements DeletableFilterInterface
{
    use DeletableFilterTrait;

    public function __construct(Searchable $searchable, private ?SoftFilter $softFilter = null)
    {
        parent::__construct($searchable);
    }

    public function applyFilters(Builder $builder): Builder
    {
        parent::applyFilters($builder);
        $this->deletable($builder);
        return $builder;
    }

    private function deletable(Builder|SoftDeletes $builder): void
    {
        switch ($this->softFilter?->getDeletableType()) {
            case DeletableTypeEnum::ALL:
                $builder->withTrashed();
                break;
            case DeletableTypeEnum::DELETED:
                $builder->onlyTrashed();
                break;
        }
    }
}
