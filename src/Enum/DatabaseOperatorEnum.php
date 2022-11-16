<?php

namespace Sun\LaravelEloquentFilter\Enum;

class DatabaseOperatorEnum extends AbstractEnum
{
    public const EQUAL = '=';
    public const NOT_EQUAL = '!=';
    public const GREATER_THAN = '>';
    public const GREATER_THAN_OR_EQUAL_TO = '>=';
    public const LESS_THAN = '<';
    public const LESS_THAN_OR_EQUAL_TO = '<=';
    public const LIKE = 'like';

    public static function getValues(): array
    {
        return [
            self::EQUAL,
            self::NOT_EQUAL,
            self::GREATER_THAN,
            self::GREATER_THAN_OR_EQUAL_TO,
            self::LESS_THAN,
            self::LESS_THAN_OR_EQUAL_TO,
            self::LIKE,
        ];
    }
}
