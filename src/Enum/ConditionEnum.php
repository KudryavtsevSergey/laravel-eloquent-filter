<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Enum;

class ConditionEnum extends AbstractEnum
{
    public const EQUAL = 'eq';
    public const NOT_EQUAL = 'neq';
    public const IS_NULL = 'is_null';
    public const NOT_NULL = 'not_null';
    public const GREATER_THAN = 'gt';
    public const GREATER_THAN_OR_EQUAL_TO = 'gte';
    public const LESS_THAN = 'lt';
    public const LESS_THAN_OR_EQUAL_TO = 'lte';
    public const IN = 'in';
    public const NOT_IN = 'not_in';
    public const LIKE = 'like';
    public const CUSTOM = 'custom';

    public static function getValues(): array
    {
        return [
            self::EQUAL,
            self::NOT_EQUAL,
            self::IS_NULL,
            self::NOT_NULL,
            self::GREATER_THAN,
            self::GREATER_THAN_OR_EQUAL_TO,
            self::LESS_THAN,
            self::LESS_THAN_OR_EQUAL_TO,
            self::IN,
            self::NOT_IN,
            self::LIKE,
            self::CUSTOM,
        ];
    }
}
