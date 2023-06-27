<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Enum;

use Sun\LaravelEloquentFilter\Exceptions\InvalidValueException;

abstract class AbstractEnum
{
    public static function checkAllowedValue(int|string|null $value, bool $isAllowNull = false): void
    {
        $isAllow = $isAllowNull && $value === null;
        if (!$isAllow && !static::isContainValue($value)) {
            throw self::invalidValue($value);
        }
    }

    public static function invalidValue(int|string|null $value): InvalidValueException
    {
        return new InvalidValueException($value, static::getValues());
    }

    public static function isContainValue(int|string|null $value): bool
    {
        return in_array($value, static::getValues(), true);
    }

    abstract public static function getValues(): array;
}
