<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Juling\Captcha\Controllers\CaptchaController;

// 图片验证码
Route::get('captcha', [CaptchaController::class, 'index']);
