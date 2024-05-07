<?php

namespace Juling\Sms;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Overtrue\EasySms\EasySms;

class SmsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function provides()
    {
        return [EasySms::class, 'easy-sms'];
    }

    public function register()
    {
        $this->app->bind(EasySms::class, function () {
            return new EasySms(\config('services.easy-sms'));
        });

        $this->app->alias(EasySms::class, 'easy-sms');
    }
}
