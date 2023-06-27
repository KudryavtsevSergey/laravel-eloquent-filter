<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Mapper;

use Sun\LaravelEloquentFilter\Enum\ConditionEnum;
use Sun\LaravelEloquentFilter\Constant\DatabaseOperatorConstant;

/**
 * @extends AbstractMapper<string, string>
 */
class CriteriaDatabaseOperatorMapper extends AbstractMapper
{
    protected static function fieldsMap(): array
    {
        return [
            ConditionEnum::EQUAL => DatabaseOperatorConstant::EQUAL,
            ConditionEnum::NOT_EQUAL => DatabaseOperatorConstant::NOT_EQUAL,
            ConditionEnum::GREATER_THAN => DatabaseOperatorConstant::GREATER_THAN,
            ConditionEnum::GREATER_THAN_OR_EQUAL_TO => DatabaseOperatorConstant::GREATER_THAN_OR_EQUAL_TO,
            ConditionEnum::LESS_THAN => DatabaseOperatorConstant::LESS_THAN,
            ConditionEnum::LESS_THAN_OR_EQUAL_TO => DatabaseOperatorConstant::LESS_THAN_OR_EQUAL_TO,
            ConditionEnum::LIKE => DatabaseOperatorConstant::LIKE,
        ];
    }
}
