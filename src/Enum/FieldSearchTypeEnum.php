<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Enum;

class FieldSearchTypeEnum extends AbstractEnum
{
    public const STRING = 'STRING';
    public const INTEGER = 'INTEGER';
    public const BOOLEAN = 'BOOLEAN';
    public const DOUBLE = 'DOUBLE';
    public const DATE = 'DATE';
    public const DATETIME = 'DATETIME';

    public static function getValues(): array
    {
        return [
            self::STRING,
            self::INTEGER,
            self::BOOLEAN,
            self::DOUBLE,
            self::DATE,
            self::DATETIME,
        ];
    }
}
