<?php

declare(strict_types=1);

namespace Juling\Captcha\Responses\Common;

use Juling\Foundation\Support\ArrayHelper;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'CaptchaResponse')]
class CaptchaResponse
{
    use ArrayHelper;

    #[OA\Property(property: 'captcha', description: '图片验证码', type: 'string', example: '123456')]
    private string $captcha;

    #[OA\Property(property: 'uuid', description: '验证码UUID', type: 'string', example: '123456')]
    private string $uuid;

    public function setCaptcha(string $captcha): void
    {
        $this->captcha = $captcha;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }
}
