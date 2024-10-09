<?php

declare(strict_types=1);

namespace Juling\Captcha\Services;

use Exception;
use Juling\Captcha\Captcha;
use Juling\Foundation\Exceptions\CustomException;

class CaptchaService
{
    public function getCaptcha(string $uuid): string
    {
        try {
            $captcha = new Captcha();

            return $captcha->create($uuid);
        } catch (Exception $e) {
            throw new CustomException($e->getMessage());
        }
    }
}
