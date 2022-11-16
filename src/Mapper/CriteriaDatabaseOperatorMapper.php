<?php

namespace Sun\LaravelEloquentFilter\Mapper;

use Sun\LaravelEloquentFilter\Enum\ConditionEnum;
use Sun\LaravelEloquentFilter\Enum\DatabaseOperatorEnum;

class CriteriaDatabaseOperatorMapper extends AbstractMapper
{
    protected static function fieldsMap(): array
    {
        return [
            ConditionEnum::EQUAL => DatabaseOperatorEnum::EQUAL,
            ConditionEnum::NOT_EQUAL => DatabaseOperatorEnum::NOT_EQUAL,
            ConditionEnum::GREATER_THAN => DatabaseOperatorEnum::GREATER_THAN,
            ConditionEnum::GREATER_THAN_OR_EQUAL_TO => DatabaseOperatorEnum::GREATER_THAN_OR_EQUAL_TO,
            ConditionEnum::LESS_THAN => DatabaseOperatorEnum::LESS_THAN,
            ConditionEnum::LESS_THAN_OR_EQUAL_TO => DatabaseOperatorEnum::LESS_THAN_OR_EQUAL_TO,
            ConditionEnum::LIKE => DatabaseOperatorEnum::LIKE,
        ];
    }
}
