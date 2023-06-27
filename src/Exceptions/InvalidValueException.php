<?php

declare(strict_types=1);

namespace Sun\LaravelEloquentFilter\Exceptions;

class InvalidValueException extends InternalError
{
    public function __construct(int|string|null $value, array $allowedValues)
    {
        $message = sprintf(
            'Value "%s" is not allowed. Allowed values are: %s',
            $value,
            implode(', ', $allowedValues)
        );
        parent::__construct($message);
    }
}
