<?php

declare(strict_types=1);

namespace Juling\Shemss\Operation;

use Juling\Shemss\Kernel\Provider;
use Exception;

/**
 * 3.5.1 运维任务申请
 */
class OperationTask extends Provider
{
    /**
     * 运维任务基础信息（新增/编辑）
     * @return array
     * @throws Exception
     */
    public function M_InsertOperationTask()
    {

    }

    /**
     * 运维任务点位（新增）
     * @return array
     * @throws Exception
     */
    public function M_InsertOperationTaskScheme()
    {
        
    }

    /**
     * 运维任务人员（新增）
     * @return array
     * @throws Exception
     */
    public function M_InsertOperationTaskWorkers()
    {

    }

    /**
     * 运维任务设备（新增）
     * @return array
     * @throws Exception
     */
    public function M_InsertOperationTaskDevices()
    {

    }

    /**
     * 运维任务计划（新增）
     * @return array
     * @throws Exception
     */
    public function M_InsertOperationTaskPlan()
    {

    }

    /**
     * 运维任务提交
     * @return array
     * @throws Exception
     */
    public function M_SubmitOperationTask()
    {

    }

    /**
     * 运维记录上传
     * @return array
     * @throws Exception
     */
    public function M_InsertOperationTaskPlanLog()
    {

    }

    /**
     * 运维报告（新增/编辑）
     * @return array
     * @throws Exception
     */
    public function M_AddOperationTaskReport()
    {

    }

    /**
     * 运维报告（删除）
     * @return array
     * @throws Exception
     */
    public function M_DelOperationTaskReport()
    {

    }

    /**
     * 运维报告（完结）
     * @return array
     * @throws Exception
     */
    public function M_OperationTaskEnd()
    {

    }

    /**
     * 运维报告（异常中止）
     * @return array
     * @throws Exception
     */
    public function M_OperationTaskAbortEnd()
    {

    }

    /**
     * 运维任务信息列表（进行中）
     * @return array
     * @throws Exception
     */
    public function M_GetALLOperationTask()
    {

    }

    /**
     * 运维任务信息（进行中）
     * @return array
     * @throws Exception
     */
    public function M_GetOperationTaskByID()
    {
        
    }

    /**
     * 运维任务计划周期列表（进行中）
     * @return array
     * @throws Exception
     */
    public function M_GetOperationTaskPlanList()
    {
        
    }

    /**
     * 运维任务信息列表（已完结）
     * @return array
     * @throws Exception
     */
    public function M_GetOperationTaskDone()
    {

    }
}
