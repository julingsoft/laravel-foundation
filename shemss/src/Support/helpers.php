<?php

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @param $data
 * @param $key
 * @param $default
 * @return array|ArrayAccess|mixed|null
 * @throws Exception
 */
function data_get($data, $key, $default = null)
{
    switch (true) {
        case is_array($data):
            return Arr::get($data, $key, $default);
        case $data instanceof Collection:
            return $data->get($key, $default);
        case $data instanceof Arrayable:
            return Arr::get($data->toArray(), $key, $default);
        case $data instanceof ArrayIterator:
            return $data->getArrayCopy()[$key] ?? $default;
        case $data instanceof ArrayAccess:
            return $data[$key] ?? $default;
        case $data instanceof IteratorAggregate && $data->getIterator() instanceof ArrayIterator:
            return $data->getIterator()->getArrayCopy()[$key] ?? $default;
        case is_object($data):
            return $data->{$key} ?? $default;
        default:
            throw new RuntimeException(sprintf('Can\'t access data with key "%s"', $key));
    }
}

/**
 * @param $data
 * @return array
 * @throws Exception
 */
function data_to_array($data)
{
    switch (true) {
        case is_array($data):
            return $data;
        case $data instanceof Collection:
            return $data->all();
        case $data instanceof Arrayable:
            return $data->toArray();
        case $data instanceof IteratorAggregate && $data->getIterator() instanceof \ArrayIterator:
            return $data->getIterator()->getArrayCopy();
        case $data instanceof ArrayIterator:
            return $data->getArrayCopy();
        default:
            throw new RuntimeException(sprintf('Can\'t transform data to array'));
    }
}

/**
 * Generate a signature.
 *
 * @param array  $attributes
 * @param string $key
 * @param string $encryptMethod
 *
 * @return string
 */
function generate_sign(array $attributes, string $key, string $encryptMethod = 'md5'): string
{
    ksort($attributes);

    $attributes['key'] = $key;

    return strtoupper(call_user_func_array($encryptMethod, [urldecode(http_build_query($attributes))]));
}

/**
 * @param string $signType
 * @param string $secretKey
 *
 * @return \Closure|string
 */
function get_encrypt_method(string $signType, string $secretKey = '')
{
    if ('HMAC-SHA256' === $signType) {
        return function ($str) use ($secretKey) {
            return hash_hmac('sha256', $str, $secretKey);
        };
    }

    return 'md5';
}

/**
 * Get client ip.
 *
 * @return string
 */
function get_client_ip(): string
{
    if (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        // for php-cli(phpunit etc.)
        $ip = defined('PHPUNIT_RUNNING') ? '127.0.0.1' : gethostbyname(gethostname());
    }

    return filter_var($ip, FILTER_VALIDATE_IP) ?: '127.0.0.1';
}

/**
 * Get current server ip.
 *
 * @return string
 */
function get_server_ip(): string
{
    if (!empty($_SERVER['SERVER_ADDR'])) {
        $ip = $_SERVER['SERVER_ADDR'];
    } elseif (!empty($_SERVER['SERVER_NAME'])) {
        $ip = gethostbyname($_SERVER['SERVER_NAME']);
    } else {
        // for php-cli(phpunit etc.)
        $ip = defined('PHPUNIT_RUNNING') ? '127.0.0.1' : gethostbyname(gethostname());
    }

    return filter_var($ip, FILTER_VALIDATE_IP) ?: '127.0.0.1';
}

/**
 * Return current url.
 *
 * @return string
 */
function current_url(): string
{
    $protocol = 'http://';

    if ((!empty($_SERVER['HTTPS']) && 'off' !== $_SERVER['HTTPS']) || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? 'http') === 'https') {
        $protocol = 'https://';
    }

    return $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

/**
 * Return random string.
 *
 * @param string $length
 *
 * @return string
 */
function str_random($length): string
{
    return Str::random($length);
}

/**
 * @param string $content
 * @param string $publicKey
 *
 * @return string
 */
function rsa_public_encrypt($content, $publicKey): string
{
    $encrypted = '';
    openssl_public_encrypt($content, $encrypted, openssl_pkey_get_public($publicKey), OPENSSL_PKCS1_OAEP_PADDING);

    return base64_encode($encrypted);
}

