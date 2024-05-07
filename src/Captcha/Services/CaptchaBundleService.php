<?php

declare(strict_types=1);

namespace Juling\Captcha\Services;

use Juling\Captcha\Responses\Common\CaptchaResponse;
use Juling\Foundation\Exceptions\CustomException;
use Exception;
use Illuminate\Support\Str;
use Juling\Captcha\Captcha;

class CaptchaBundleService
{
    /**
     * @throws Exception
     */
    public function getCaptcha(): array
    {
        try {
            $uuid = strval(Str::uuid());

            $captcha = new Captcha();
            $base64 = $captcha->create($uuid);

            $captchaResponse = new CaptchaResponse();
            $captchaResponse->setCaptcha($base64);
            $captchaResponse->setUuid($uuid);

            return $captchaResponse->toArray();
        } catch (Exception $e) {
            throw new CustomException($e->getMessage());
        }
    }
}
