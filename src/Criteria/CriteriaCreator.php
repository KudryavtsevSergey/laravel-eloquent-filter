<?php

namespace Sun\LaravelEloquentFilter\Criteria;

use Sun\LaravelEloquentFilter\Enum\ConditionEnum;

class CriteriaCreator
{
    public static function create(string $criteria, mixed $value, string $fieldType): CriteriaInterface
    {
        return match ($criteria) {
            ConditionEnum::EQUAL,
            ConditionEnum::NOT_EQUAL,
            ConditionEnum::GREATER_THAN,
            ConditionEnum::GREATER_THAN_OR_EQUAL_TO,
            ConditionEnum::LESS_THAN,
            ConditionEnum::LESS_THAN_OR_EQUAL_TO => new FieldCriteria($value, $criteria, $fieldType),
            ConditionEnum::LIKE => new FieldCriteria(sprintf('%%%s%%', $value), $criteria, $fieldType),
            ConditionEnum::IS_NULL => new IsNullCriteria(),
            ConditionEnum::NOT_NULL => new NotNullCriteria(),
            ConditionEnum::IN => new InCriteria($value, $fieldType),
            ConditionEnum::NOT_IN => new NotInCriteria($value, $fieldType),
            default => throw ConditionEnum::invalidValue($criteria),
        };
    }
}
