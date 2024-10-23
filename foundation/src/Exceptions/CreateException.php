<?php

declare(strict_types=1);

namespace Juling\Foundation\Exceptions;

use Juling\Foundation\Contracts\EnumMethodInterface;
use Juling\Foundation\Enums\CodeEnum;
use Symfony\Component\HttpFoundation\Response;

class CreateException extends CustomException
{
    public function __construct(EnumMethodInterface|string|null $e = null, $code = Response::HTTP_INTERNAL_SERVER_ERROR, $previous = null)
    {
        if (is_null($e)) {
            $enum = CodeEnum::CREATE_ERROR;
            $e = $enum->getDescription();
            $code = $enum->getValue();
        }

        parent::__construct($e, $code, $previous);
    }
}
