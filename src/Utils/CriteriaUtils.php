<?php

namespace Sun\LaravelEloquentFilter\Utils;

use Carbon\Carbon;
use Sun\LaravelEloquentFilter\Enum\FieldSearchTypeEnum;

class CriteriaUtils
{
    private const DATE_FORMAT = 'Y-m-d';
    private const DATETIME_FORMAT = 'Y-m-d H:i:s';

    public static function formatValues(string $fieldType, array $items): array
    {
        return array_map(static fn(mixed $item): mixed => CriteriaUtils::formatValue($fieldType, $item), $items);
    }

    public static function formatValue(string $fieldType, mixed $value): mixed
    {
        return match ($fieldType) {
            FieldSearchTypeEnum::STRING => strval($value),
            FieldSearchTypeEnum::INTEGER => filter_var($value, FILTER_VALIDATE_INT),
            FieldSearchTypeEnum::BOOLEAN => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            FieldSearchTypeEnum::DOUBLE => filter_var($value, FILTER_VALIDATE_FLOAT),
            FieldSearchTypeEnum::DATE => Carbon::createFromFormat(self::DATE_FORMAT, $value),
            FieldSearchTypeEnum::DATETIME => Carbon::createFromFormat(self::DATETIME_FORMAT, $value),
            default => throw FieldSearchTypeEnum::invalidValue($fieldType),
        };
    }
}
