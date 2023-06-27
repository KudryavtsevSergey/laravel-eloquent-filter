<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Fields;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

interface SearchTypeInterface
{
    public function configureBuilder(Builder $builder, string $criteria, Carbon|array|bool|float|int|string|null $value): void;
}
