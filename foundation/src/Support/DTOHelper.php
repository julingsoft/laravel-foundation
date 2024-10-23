<?php

declare(strict_types=1);

namespace Juling\Foundation\Support;

use Juling\Foundation\Serializer\Serializer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionProperty;
use stdClass;
use Throwable;

trait DTOHelper
{
    public function __construct(array $data = [])
    {
        $this->loadData($data);
    }

    /**
     * 将数组批量赋值到对象属性
     */
    public function loadData(array $data = []): void
    {
        foreach ($data as $col => $val) {
            if (! is_null($val)) {
                $setMethod = 'set'.Str::studly($col);
                if (method_exists($this, $setMethod)) {
                    $this->$setMethod($val);
                }
            }
        }
    }

    /**
     * 将对象转换到数组
     */
    public function toData(bool $filterZeroVal = true): array
    {
        try {
            $effectiveData = Serializer::normalize($this);
            if ($filterZeroVal) {
                return $effectiveData;
            }

            $properties = $this->getProperties();
            foreach ($properties as $item) {
                if (isset($effectiveData[$item->getName()])) {
                    continue;
                }
                $effectiveData[$item->getName()] = $this->getDefaultValByType($item);
            }

            return $effectiveData;
        } catch (Throwable $e) {
            Log::error($e);

            return [];
        }
    }

    /**
     * 获取数据表数据
     */
    public function toEntity(bool $filterZeroVal = true): array
    {
        $effectiveData = [];
        foreach ($this->toData($filterZeroVal) as $key => $val) {
            $effectiveData[Str::snake($key)] = is_array($val) ? json_encode($val, JSON_UNESCAPED_UNICODE) : $val;
        }

        return $effectiveData;
    }

    /**
     * 获取数组数据
     */
    public function toArray(bool $filterZeroVal = true): array
    {
        return $this->toData($filterZeroVal);
    }

    /**
     * 获取JSON数据
     */
    public function toJson(bool $filterZeroVal = true): string
    {
        return json_encode($this->toData($filterZeroVal), JSON_UNESCAPED_UNICODE);
    }

    /**
     * 获取Collection
     */
    public function collect(bool $filterZeroVal = true): Collection
    {
        return new Collection($this->toData($filterZeroVal));
    }

    /**
     * 获取对象属性
     */
    private static function getProperties(): array
    {
        $reflectionClass = new ReflectionClass(self::class);

        return $reflectionClass->getProperties(ReflectionProperty::IS_PRIVATE);
    }

    /**
     * 获取类型的默认值
     */
    private function getDefaultValByType(ReflectionProperty $property): mixed
    {
        $type = $property->getType();
        if ($type->isBuiltin()) {
            return match ($type->getName()) {
                // 标量类型
                'int' => 0,
                'float' => 0.0,
                'string' => '',
                'bool' => false,
                // 复合类型
                'array' => [],
                'object' => new stdClass,
                // 其他类型：resource, null
                default => null,
            };
        } else {
            return new ($type->getName());
        }
    }
}
