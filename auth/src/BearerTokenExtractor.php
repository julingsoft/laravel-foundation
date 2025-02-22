<?php

declare(strict_types=1);

namespace Juling\Auth;

use Juling\Auth\Exception\ExtractTokenException;
use Illuminate\Support\Facades\Request;

class BearerTokenExtractor implements TokenExtractorInterface
{
    /**
     * 提取token
     *
     * @throws ExtractTokenException
     */
    public function extractToken(): string
    {
        return Request::bearerToken();
    }
}
