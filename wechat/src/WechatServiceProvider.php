<?php

namespace Juling\Wechat;

use EasyWeChat\MiniApp\Application as MiniApp;
use EasyWeChat\OfficialAccount\Application as OfficialAccount;
use EasyWeChat\OpenPlatform\Application as OpenPlatform;
use EasyWeChat\OpenWork\Application as OpenWork;
use EasyWeChat\Pay\Application as Payment;
use EasyWeChat\Work\Application as Work;
use Illuminate\Support\ServiceProvider;

class WechatServiceProvider extends ServiceProvider
{
    protected function setupConfig()
    {
        $source = realpath(dirname(__DIR__).'/config/wechat.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([$source => \config_path('wechat.php')], 'laravel-wechat');
        }

        $this->mergeConfigFrom($source, 'wechat');
    }

    public function register()
    {
        $this->setupConfig();

        $apps = [
            'official_account' => OfficialAccount::class,
            'work' => Work::class,
            'mini_app' => MiniApp::class,
            'pay' => Payment::class,
            'open_platform' => OpenPlatform::class,
            'open_work' => OpenWork::class,
        ];

        foreach ($apps as $name => $class) {
            if (empty(config('wechat.'.$name))) {
                continue;
            }

            if (! empty(config('wechat.'.$name.'.app_id')) || ! empty(config('wechat.'.$name.'.corp_id'))) {
                $accounts = [
                    'default' => config('wechat.'.$name),
                ];
                config(['wechat.'.$name.'.default' => $accounts['default']]);
            } else {
                $accounts = config('wechat.'.$name);
            }

            foreach ($accounts as $account => $config) {
                $this->app->bind("wechat.{$name}.{$account}", function ($laravelApp) use ($config, $class) {
                    $app = new $class(array_merge(config('wechat.defaults', []), $config));

                    if (\is_callable([$app, 'setCache'])) {
                        $app->setCache($laravelApp['cache.store']);
                    }

                    if (\is_callable([$app, 'setRequestFromSymfonyRequest'])) {
                        $app->setRequestFromSymfonyRequest($laravelApp['request']);
                    }

                    return $app;
                });
            }
            $this->app->alias("wechat.{$name}.default", 'wechat.'.$name);
            $this->app->alias('wechat.'.$name, $class);
        }
    }
}
