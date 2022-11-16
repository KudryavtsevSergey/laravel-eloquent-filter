<?php

namespace Sun\LaravelEloquentFilter\Fields;

use Illuminate\Database\Eloquent\Builder;
use Sun\LaravelEloquentFilter\Enum\FieldSearchTypeEnum;

class CustomSearchType implements CustomSearchTypeInterface
{
    public function __construct(
        private $callback,
        private string $fieldType = FieldSearchTypeEnum::STRING,
    ) {
    }

    public function configureBuilder(Builder $builder, mixed $value): void
    {
        $callback = $this->callback;
        $callback($builder, $value);
    }
}
