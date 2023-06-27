<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Utils;

use Carbon\Carbon;
use Sun\LaravelEloquentFilter\Enum\FieldSearchTypeEnum;

class CriteriaUtils
{
    private const DATE_FORMAT = 'Y-m-d';
    private const DATETIME_FORMAT = 'Y-m-d H:i:s';

    public static function formatValues(string $fieldType, array $items): array
    {
        return array_map(static fn(
            bool|float|int|string|null $item
        ): string|int|bool|float|Carbon => CriteriaUtils::formatValue($fieldType, $item), $items);
    }

    public static function formatValue(
        string $fieldType,
        Carbon|bool|float|int|string|null $value
    ): string|int|bool|float|Carbon {
        return match ($fieldType) {
            FieldSearchTypeEnum::STRING => strval($value),
            FieldSearchTypeEnum::INTEGER => filter_var($value, FILTER_VALIDATE_INT),
            FieldSearchTypeEnum::BOOLEAN => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            FieldSearchTypeEnum::DOUBLE => filter_var($value, FILTER_VALIDATE_FLOAT),
            FieldSearchTypeEnum::DATE => $value instanceof Carbon ? $value : Carbon::createFromFormat(self::DATE_FORMAT, (string)$value),
            FieldSearchTypeEnum::DATETIME => $value instanceof Carbon ? $value : Carbon::createFromFormat(self::DATETIME_FORMAT, (string)$value),
            default => throw FieldSearchTypeEnum::invalidValue($fieldType),
        };
    }
}
