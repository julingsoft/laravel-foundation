<?php

declare(strict_types=1);

namespace Juling\Foundation\Exceptions;

use Juling\Foundation\Contracts\EnumMethodInterface;
use Juling\Foundation\Enums\CodeEnum;
use Symfony\Component\HttpFoundation\Response;

class CustomException extends RuntimeException
{
    public function __construct(EnumMethodInterface|string $e, $code = Response::HTTP_INTERNAL_SERVER_ERROR, $previous = null)
    {
        if ($e instanceof EnumMethodInterface) {
            parent::__construct($e->getDescription(), $e->getValue(), $previous);
        } else {
            parent::__construct($e, $code, $previous);
        }
    }
}
