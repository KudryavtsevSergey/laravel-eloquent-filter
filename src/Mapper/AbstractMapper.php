<?php

namespace Sun\LaravelEloquentFilter\Mapper;

use Sun\LaravelEloquentFilter\Exceptions\InvalidValueException;

abstract class AbstractMapper
{
    public static function map(mixed $field, mixed $default = null): mixed
    {
        $fields = static::fieldsMap();
        return self::mapFromFields($field, $fields, $default);
    }

    public static function flipMap(mixed $field, mixed $default = null): mixed
    {
        $fields = static::fieldsMap();
        return self::mapFromFields($field, array_flip($fields), $default);
    }

    private static function mapFromFields(mixed $field, array $fields, mixed $default = null): mixed
    {
        if ($default === null) {
            self::check($field, $fields);
        }

        return $fields[$field] ?? $default;
    }

    private static function check(mixed $field, array $fields): void
    {
        $allowedValues = array_keys($fields);
        if (!in_array($field, $allowedValues, true)) {
            throw new InvalidValueException($field, $allowedValues);
        }
    }

    protected abstract static function fieldsMap(): array;
}
