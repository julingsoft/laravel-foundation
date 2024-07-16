<?php

declare(strict_types=1);

namespace Juling\Captcha\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Juling\Captcha\Enums\CaptchaErrorEnum;
use Juling\Captcha\Responses\CaptchaResponse;
use Juling\Captcha\Services\CaptchaService;
use Juling\Foundation\Exceptions\CustomException;
use Juling\Foundation\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class CaptchaController extends Controller
{
    #[OA\Get(path: '/captcha', summary: '图片验证码', tags: ['验证码'])]
    #[OA\Response(response: 200, description: 'OK', content: new OA\JsonContent(ref: CaptchaResponse::class))]
    public function index(): JsonResponse
    {
        try {
            $uuid = strval(Str::uuid());
            $captchaService = new CaptchaService();
            $base64 = $captchaService->getCaptcha($uuid);

            $response = new CaptchaResponse();
            $response->setCaptcha($base64);
            $response->setUuid($uuid);

            return $this->success($response->toArray());
        } catch (Exception $e) {
            if ($e instanceof CustomException) {
                return $this->error($e->getMessage());
            }

            Log::error($e->getMessage());

            return $this->error(CaptchaErrorEnum::CAPTCHA_ERROR);
        }
    }
}
