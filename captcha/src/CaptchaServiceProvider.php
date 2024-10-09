<?php

declare(strict_types=1);

namespace Juling\Captcha;

use Illuminate\Support\ServiceProvider;

class CaptchaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            dirname(__DIR__).'/config/captcha.php', 'captcha'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            dirname(__DIR__).'/config/captcha.php' => config_path('captcha.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
    }
}
