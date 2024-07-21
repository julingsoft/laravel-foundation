<?php

declare(strict_types=1);

namespace Juling\Foundation\Exceptions;

use Juling\Foundation\Contracts\EnumMethodInterface;
use Juling\Foundation\Enums\BusinessCodeEnum;
use Symfony\Component\HttpFoundation\Response;

class UpdateException extends CustomException
{
    public function __construct(EnumMethodInterface|string $e = null, $code = Response::HTTP_INTERNAL_SERVER_ERROR, $previous = null)
    {
        if (is_null($e)) {
            $enum = BusinessCodeEnum::UPDATE_ERROR;
            $e = $enum->getDescription();
            $code = $enum->getValue();
        }

        parent::__construct($e, $code, $previous);
    }
}