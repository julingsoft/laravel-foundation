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
    public function getCaptcha(string $uuid): string
    {
        $captcha = new Captcha();

        return $captcha->create($uuid);
    }
}
