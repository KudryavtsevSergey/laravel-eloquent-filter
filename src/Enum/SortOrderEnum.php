<?php

namespace Sun\LaravelEloquentFilter\Enum;

class SortOrderEnum extends AbstractEnum
{
    public const DESC = 'desc';
    public const ASC = 'asc';

    public static function getValues(): array
    {
        return [
            self::DESC,
            self::ASC,
        ];
    }
}
