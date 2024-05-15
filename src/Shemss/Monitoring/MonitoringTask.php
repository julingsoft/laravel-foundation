<?php

declare(strict_types=1);

namespace Juling\Shemss\Monitoring;

use Juling\Shemss\Kernel\Provider;
use Exception;

class MonitoringTask extends Provider
{
    /**
     * 委托任务申请（添加/编辑）
     * @return array
     * @throws Exception
     */
    public function M_InsertMonitoringTask()
    {

    }

    /**
     * 监测任务信息（进行中）
     * @return array
     * @throws Exception
     */
    public function M_GetALLMonitorTask()
    {
        // M_GetALLMonitorTask
    }

    /**
     * 监测任务信息（已完结）
     * @return array
     * @throws Exception
     */
    public function M_GetDoneMonitorTask()
    {
        // M_GetDoneMonitorTask (最近一周完结任务)
    }

    /**
     * 监测任务（方案信息）
     * @return array
     * @throws Exception
     */
    public function M_GetMonitorTaskSchemeByMTID()
    {
        
    }

    /**
     * 监测任务（检测报告）列表
     * @return array
     * @throws Exception
     */
    public function M_GetUReportList()
    {
        
    }

    /**
     * 监测任务（补传申请）列表
     * @return array
     * @throws Exception
     */
    public function M_GetReportApply()
    {
        
    }
}
