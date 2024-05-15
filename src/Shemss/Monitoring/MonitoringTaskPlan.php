<?php

namespace Juling\Shemss\Monitoring;

use Juling\Shemss\Kernel\Provider;
use Exception;

/**
 * 3.4.2 方案编制
 */
class MonitoringTaskPlan extends Provider
{
    /**
     * 方案编制（新增）(单个任务执行)
     * 建议方案全部编制完成后一起提交或按点位进行提交；任务只能在方案编制阶段进行新增
     * @return array
     * @throws Exception
     */
    public function M_InsertMonitorTaskPlan()
    {
        
    }

    /**
     * 方案编制（方案点位编辑）
     * @return array
     * @throws Exception
     */
    public function M_EditScheme()
    {
        
    }

    /**
     * 方案编制（方案点位删除）
     * @return array
     * @throws Exception
     */
    public function M_DelScheme()
    {

    }

    /**
     * 方案编制（采样任务新增/编辑）
     * @return array
     * @throws Exception
     */
    public function M_EditPlan()
    {

    }

    /**
     * 方案编制（采样任务删除）
     * @return array
     * @throws Exception
     */
    public function M_DelPlan()
    {
        
    }

    /**
     * 方案编制（相关附件）
     * @return array
     * @throws Exception
     */
    public function M_InsertMonitorTaskFile()
    {
        
    }

    /**
     * 方案编制（提交）
     * @return array
     * @throws Exception
     */
    public function M_SubmitPlan()
    {
        
    }
}