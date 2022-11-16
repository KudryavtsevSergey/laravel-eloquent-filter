<?php

namespace Sun\LaravelEloquentFilter\Enum;

class DeletableTypeEnum extends AbstractEnum
{
    public const ACTIVE = 'active';
    public const ALL = 'all';
    public const DELETED = 'deleted';

    public static function getValues(): array
    {
        return [
            self::ACTIVE,
            self::ALL,
            self::DELETED,
        ];
    }
}
