<?php

namespace Juling\Social;

use Illuminate\Support\Facades\Facade;

class Socialite extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Overtrue\\Socialite\\SocialiteManager';
    }
}
