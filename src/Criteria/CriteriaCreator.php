<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Criteria;

use Carbon\Carbon;
use Sun\LaravelEloquentFilter\Enum\ConditionEnum;

class CriteriaCreator
{
    public static function create(
        string $criteria,
        Carbon|array|bool|float|int|string|null $value,
        string $fieldType
    ): CriteriaInterface {
        return match (true) {
            $criteria === ConditionEnum::EQUAL && !is_array($value),
            $criteria === ConditionEnum::NOT_EQUAL && !is_array($value),
            $criteria === ConditionEnum::GREATER_THAN && !is_array($value),
            $criteria === ConditionEnum::GREATER_THAN_OR_EQUAL_TO && !is_array($value),
            $criteria === ConditionEnum::LESS_THAN && !is_array($value),
            $criteria === ConditionEnum::LESS_THAN_OR_EQUAL_TO && !is_array($value) => new FieldCriteria($value, $criteria, $fieldType),
            $criteria === ConditionEnum::LIKE && !is_array($value) => new FieldCriteria(sprintf('%%%s%%', $value), $criteria, $fieldType),
            $criteria === ConditionEnum::IS_NULL => new IsNullCriteria(),
            $criteria === ConditionEnum::NOT_NULL => new NotNullCriteria(),
            $criteria === ConditionEnum::IN && is_array($value) => new InCriteria($value, $fieldType),
            $criteria === ConditionEnum::NOT_IN && is_array($value) => new NotInCriteria($value, $fieldType),
            default => throw ConditionEnum::invalidValue($criteria),
        };
    }
}
