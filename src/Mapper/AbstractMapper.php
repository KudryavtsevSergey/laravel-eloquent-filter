<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Mapper;

use Sun\LaravelEloquentFilter\Exceptions\InvalidValueException;

/**
 * @template TKey of array-key
 * @template TValue of array-key
 */
abstract class AbstractMapper
{
    /**
     * @param int|string|null $field
     * @param int|string|null $default
     * @return TValue
     */
    public static function map(int|string|null $field, int|string|null $default = null)
    {
        $fields = static::fieldsMap();
        return self::mapFromFields($field, $fields, $default);
    }

    /**
     * @param int|string|null $field
     * @param int|string|null $default
     * @return TKey
     */
    public static function flipMap(int|string|null $field, int|string|null $default = null)
    {
        $fields = static::fieldsMap();
        return self::mapFromFields($field, array_flip($fields), $default);
    }

    /**
     * @param int|string|null $field
     * @param array $fields
     * @param int|string|null $default
     * @return TKey|TValue
     */
    private static function mapFromFields(int|string|null $field, array $fields, int|string|null $default = null)
    {
        if ($default === null) {
            self::check($field, $fields);
        }

        return $fields[$field] ?? $default;
    }

    private static function check(int|string|null $field, array $fields): void
    {
        $allowedValues = array_keys($fields);
        if (!in_array($field, $allowedValues, true)) {
            throw new InvalidValueException($field, $allowedValues);
        }
    }

    protected abstract static function fieldsMap(): array;
}
