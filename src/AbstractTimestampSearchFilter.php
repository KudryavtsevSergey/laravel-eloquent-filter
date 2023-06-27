<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter;

use Sun\LaravelEloquentFilter\Components\TimestampableFilterInterface;
use Sun\LaravelEloquentFilter\Components\TimestampableFilterTrait;

abstract class AbstractTimestampSearchFilter extends AbstractSearchFilter implements TimestampableFilterInterface
{
    use TimestampableFilterTrait;
}
