<?php

declare(strict_types=1);

namespace Juling\Captcha;

use Illuminate\Support\ServiceProvider;

class CaptchaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/captcha.php', 'captcha'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/Config/captcha.php' => config_path('captcha.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
    }
}
