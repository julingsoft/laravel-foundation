<?php

declare(strict_types=1);

namespace Juling\Foundation\Services;

use Juling\Foundation\Contracts\CommonServiceInterface;
use Juling\Foundation\Contracts\CurdRepositoryInterface;
use Juling\Foundation\Exceptions\BusinessException;

/**
 * @method CurdRepositoryInterface getRepository()
 */
abstract class CommonService implements CommonServiceInterface
{
    /**
     * 插入记录并返回 主键 值
     */
    public function insertGetId(array $entity): mixed
    {
        return $this->getRepository()->save($entity);
    }

    /**
     * 插入一条记录
     */
    public function save(array $entity): bool
    {
        $insertId = $this->insertGetId($entity);

        return $insertId > 0;
    }

    /**
     * 插入（批量）
     */
    public function saveBatch(array $dataSet, int $batchSize = self::DEFAULT_BATCH_SIZE): bool
    {
        $listGroup = array_chunk($dataSet, $batchSize);

        $collections = [];
        foreach ($listGroup as $data) {
            $collections[] = $this->getRepository()->saveAll($data);
        }

        return ! empty($collections);
    }

    /**
     * 批量修改插入
     */
    public function saveOrUpdateBatch(array $dataSet, int $batchSize = self::DEFAULT_BATCH_SIZE): bool
    {
        throw new BusinessException('TODO: Implement saveOrUpdateBatch() method.');
    }

    /**
     * 根据 主键 删除
     */
    public function removeById(mixed $id): bool
    {
        return $this->getRepository()->deleteById($id);
    }

    /**
     * 根据条件，删除记录
     */
    public function remove(array $condition = []): bool
    {
        if (empty($condition)) {
            return false;
        }

        return $this->getRepository()->delete($condition);
    }

    /**
     * 删除（根据 主键 批量删除）
     */
    public function removeByIds(array $ids): bool
    {
        return $this->getRepository()->deleteAllByIds($ids);
    }

    /**
     * 根据 主键 选择修改
     */
    public function updateById(array $entity, mixed $id): bool
    {
        $affectedRow = $this->getRepository()->updateById($entity, $id);

        return $affectedRow > 0;
    }

    /**
     * 根据条件，更新记录
     */
    public function update(array $entity, array $condition = []): bool
    {
        if (empty($condition)) {
            return false;
        }

        $affectedRow = $this->getRepository()->update($entity, $condition);

        return $affectedRow > 0;
    }

    /**
     * 存在更新记录，否插入一条记录
     */
    public function saveOrUpdate(array $entity): bool
    {
        throw new BusinessException('TODO: Implement saveOrUpdate() method.');
    }

    /**
     * 根据 主键 查询
     */
    public function getOneById(mixed $id): array
    {
        return $this->getRepository()->findById($id);
    }

    /**
     * 查询（根据 主键 批量查询）
     */
    public function getListByIds(array $ids, string $order = '', string $sort = 'desc'): array
    {
        return $this->getRepository()->findAllByIds($ids, $order, $sort);
    }

    /**
     * 根据条件，查询一条记录
     */
    public function getOne(array $condition = [], string $order = '', string $sort = 'desc'): array
    {
        return $this->getRepository()->find($condition, $order, $sort);
    }

    /**
     * 查询某个字段的值
     */
    public function value(string $field, array $condition = []): mixed
    {
        return $this->getRepository()->value($field, $condition);
    }

    /**
     * 查询某一列的值
     */
    public function pluck(string $field, array $condition = []): array
    {
        return $this->getRepository()->pluck($field, $condition);
    }

    /**
     * 根据条件，查询总记录数
     */
    public function count(array $condition = []): int
    {
        return $this->getRepository()->count($condition);
    }

    /**
     * 查询列表
     */
    public function getList(array $condition = [], string $order = '', string $sort = 'desc'): array
    {
        return $this->getRepository()->findAll($condition, $order, $sort);
    }

    /**
     * 分页查询列表
     */
    public function page(array $condition = [], int $page = 1, int $perPage = 20, string $order = '', string $sort = 'desc'): array
    {
        return $this->getRepository()->page($condition, $page, $perPage, $order, $sort);
    }
}
