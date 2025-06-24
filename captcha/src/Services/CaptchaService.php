<?php

declare(strict_types=1);

namespace Juling\Captcha\Services;

use Exception;
use Juling\Captcha\Captcha;

class CaptchaService
{
    /**
     * @throws Exception
     */
    public function create(string $uuid): string
    {
        $captcha = new Captcha();

        return $captcha->create($uuid);
    }

    public function check(string $uuid, string $code): bool
    {
        $captcha = new Captcha();

        return $captcha->check($uuid, $code);
    }
}
