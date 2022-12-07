<?php

namespace Sun\LaravelEloquentFilter\Fields;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Enum\FieldSearchTypeEnum;

class CustomSearchType implements CustomSearchTypeInterface
{
    public function __construct(
        private Closure $callback,
        private string $fieldType = FieldSearchTypeEnum::STRING,
    ) {
    }

    public function configureBuilder(Builder $builder, mixed $value): void
    {
        $callback = $this->callback;
        $callback($builder, $value);
    }
}
