<?php

declare(strict_types=1);

namespace Juling\Foundation\Serializer;

use ArrayObject;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

class Serializer
{
    /**
     * 创建序列化器实例
     */
    public static function serializer(): SymfonySerializer
    {
        $normalizers = [new ObjectNormalizer];
        $encoders = [new JsonEncoder];

        return new SymfonySerializer($normalizers, $encoders);
    }

    /**
     * 序列化 DTO 对象
     *
     * @throws ExceptionInterface
     */
    public static function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|ArrayObject|null
    {
        return self::serializer()->normalize($data, $format, $context);
    }

    /**
     * 反序列化 DTO 对象
     *
     * @throws ExceptionInterface
     */
    public static function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return self::serializer()->denormalize($data, $type, $format, $context);
    }
}
