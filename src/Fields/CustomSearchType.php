<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Fields;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class CustomSearchType implements CustomSearchTypeInterface
{
    public function __construct(
        private readonly Closure $callback,
    ) {
    }

    public function configureBuilder(Builder $builder, array|bool|float|int|string|null $value): void
    {
        $callback = $this->callback;
        $callback($builder, $value);
    }
}
