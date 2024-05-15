<?php

declare(strict_types=1);

namespace Juling\Shemss;

use Juling\Shemss\Contract\Contract;
use Juling\Shemss\Contract\ContractInput;
use Juling\Shemss\Customer\EntrustingParty;
use Juling\Shemss\Foundation\Attachment;
use Juling\Shemss\Foundation\Device;
use Juling\Shemss\Foundation\Region;
use Juling\Shemss\Foundation\Worker;
use Exception;

class Application
{
    /**
     * @var bool 调试模式
     */
    private bool $debug;

    /**
     * @var string 用户名
     */
    private string $username;

    /**
     * @var string 用户名
     */
    private string $password;

    /**
     * @param string $username 用户名
     * @param string $password 密码
     * @param bool $debug 调试模式
     */
    public function __construct(string $username, string $password, bool $debug = true)
    {
        $this->debug = $debug;
        $this->username = trim($username);
        $this->password = trim($password);
    }

    /**
     * 附件断点上传
     * @param string $fileNameNew 附件创建接口成功返回文件名称
     * @param int $fileType 上传类型：
     * 1：合同附件
     * 2：合同补充附件
     * 3：监测任务其他附件
     * 4：监测任务点位分布示意图
     * 5：监测任务方案附件
     * 6：监测任务采样补充说明文件
     * 7：监测任务检测报告
     * 8：监测任务数据报告（退回上阶段）
     * 9：监测任务采样图片
     * @param $buffer 文件流 byte[]或 base64
     * @return bool
     * @throws Exception
     */
    public function AppendFile(string $fileNameNew, int $fileType, $buffer): bool
    {
        $attachment = new Attachment($this->config());
        return $attachment->AppendFile($fileNameNew, $fileType, $buffer);
    }

    /**
     * 设备信息列表
     * @return array
     * @throws \Exception
     */
    public function B_GetALLDevicesList(): array
    {
        $device = new Device($this->config());
        return $device->B_GetALLDevicesList();
    }

    /**
     * 人员信息列表
     * @return array
     * @throws \Exception
     */
    public function B_GetALLWorkersList(): array
    {
        $worker = new Worker($this->config());
        return $worker->B_GetALLWorkersList();
    }

    /**
     * 合同基本信息（删除）
     * @return void
     */
    public function C_DeleteContractInfo()
    {
        // 暂无接口
    }

    /**
     * 合同补充说明附件（删除）
     * @param int $supply_id 补充说明编号 ID
     * @return bool
     * @throws Exception
     */
    public function C_DeleteContractSupply(int $supply_id): bool
    {
        $contract = new Contract($this->config());
        return $contract->C_DeleteContractSupply($supply_id);
    }

    /**
     * 合同基本信息列表
     * @return array
     * @throws Exception
     */
    public function C_GetALLContractList(): array
    {
        $contract = new Contract($this->config());
        return $contract->C_GetALLContractList();
    }

    /**
     * 合同基本信息（添加/新增）
     * @param ContractInput $contractInput
     * @return int
     * @throws Exception
     */
    public function C_InsertContractInfo(ContractInput $contractInput): int
    {
        $contract = new Contract($this->config());
        return $contract->C_InsertContractInfo($contractInput);
    }

    /**
     * 合同补充说明附件（添加）
     * @param int $cid 合同 ID
     * @param string $fileName 附件原名称
     * @param string $fileNameOld 附件接口返回名称
     * @return bool
     * @throws Exception
     */
    public function C_InsertContractSupply(int $cid, string $fileName, string $fileNameOld): bool
    {
        $contract = new Contract($this->config());
        return $contract->C_InsertContractSupply($cid, $fileName, $fileNameOld);
    }

    /**
     * 委托方列表
     * @return array
     * @throws \Exception
     */
    public function C_PartyABasicDataList(): array
    {
        $entrustingParty = new EntrustingParty($this->config());
        return $entrustingParty->C_PartyABasicDataList();
    }

    /**
     * 附件创建
     *
     * @param string $name 需上传文件的名称
     * @param int $type 上传类型：
     * 1：合同附件
     * 2：合同补充附件
     * 3：监测任务其他附件
     * 4：监测任务点位分布示意图
     * 5：监测任务方案附件
     * 6：监测任务采样补充说明文件
     * 7：监测任务检测报告
     * 8：监测任务数据报告（退回上阶段）
     * 9：监测任务采样图片
     *
     * @return string
     * @throws Exception
     */
    public function CreateFile(string $name, int $type): string
    {
        $attachment = new Attachment($this->config());
        return $attachment->CreateFile($name, $type);
    }

    /**
     * 采样计划（计划采样设备）
     * @return void
     */
    public function M_AddDeivces()
    {
    }

    /**
     * 运维报告（新增/编辑）
     * @return void
     */
    public function M_AddOperationTaskReport()
    {
    }

    /**
     * 数据报告（检测报告新增/编辑）
     * @return void
     */
    public function M_AddUReport()
    {
    }

    /**
     * 采样计划（计划采样人员）
     * @return void
     */
    public function M_AddWorkers()
    {
    }

    /**
     * 数据报告（退回上阶段）
     * @return void
     */
    public function M_Back()
    {
    }

    /**
     * 运维报告（删除）
     * @return void
     */
    public function M_DelOperationTaskReport()
    {
    }

    /**
     * 方案编制（采样任务删除）
     * @return void
     */
    public function M_DelPlan()
    {
    }

    /**
     * 方案编制（方案点位删除）
     * @return void
     */
    public function M_DelScheme()
    {
    }

    /**
     * 数据报告（检测报告删除）
     * @return void
     */
    public function M_DelUReport()
    {
    }

    /**
     * 方案编制（采样任务新增/编辑）strXmlPlan XML字符串
     * @return void
     */
    public function M_EditPlan()
    {
    }

    /**
     * 方案编制（采样任务新增/编辑）strXmlPlan XML对象
     * @return void
     */
    public function M_EditPlanXML()
    {
    }

    /**
     * 方案编制（方案点位编辑）
     * @return void
     */
    public function M_EditScheme()
    {
    }

    /**
     * 数据报告（完结）
     * @return void
     */
    public function M_EndAnalysis()
    {
    }

    /**
     * 采样管理（完结）
     * @return void
     */
    public function M_EndSamp()
    {
    }

    /**
     * 监测任务信息（进行中）
     * @return void
     */
    public function M_GetALLMonitorTask()
    {
    }

    /**
     * 运维任务信息列表（进行中）
     * @return void
     */
    public function M_GetALLOperationTask()
    {
    }

    /**
     * 监测任务信息（已完结）(最近一周)
     * @return void
     */
    public function M_GetDoneMonitorTask()
    {
    }

    /**
     * 监测任务信息（进行中）,根据任务编号查询
     * @return void
     */
    public function M_GetMonitorTaskByRWBH()
    {
    }

    /**
     * 监测任务（方案信息）
     * @return void
     */
    public function M_GetMonitorTaskSchemeByMTID()
    {
    }

    /**
     * 运维内容列表
     * @return void
     */
    public function M_GetOperationDetailList()
    {
    }

    /**
     * 运维点位列表
     * @return void
     */
    public function M_GetOperationSchemeList()
    {
    }

    /**
     * 运维任务信息（进行中）
     * @return void
     */
    public function M_GetOperationTaskByID()
    {
    }

    /**
     * 运维任务信息列表（已完结）（最近一周）
     * @return void
     */
    public function M_GetOperationTaskDone()
    {
    }

    /**
     * 运维任务计划周期列表（进行中）
     * @return void
     */
    public function M_GetOperationTaskPlanList()
    {
    }

    /**
     * 采样计划（计划清单列表）
     * @return void
     */
    public function M_GetPlanList()
    {
    }

    /**
     * 监测任务（补传申请）列表
     * @return void
     */
    public function M_GetReportApply()
    {
    }

    /**
     * 数据报告（生成系统编号）
     * @return void
     */
    public function M_GetReportNum()
    {
    }

    /**
     * 监测任务（检测报告）列表
     * @return void
     */
    public function M_GetUReportList()
    {
    }

    /**
     * 方案编制（相关附件）(4点位分布示意图 5方案附件)
     * @return void
     */
    public function M_InsertMonitorTaskFile()
    {
    }

    /**
     * 方案编制（新增）(单个任务执行) strXmlPlan XML字符串
     * @return void
     */
    public function M_InsertMonitorTaskPlan()
    {
    }

    /**
     * 方案编制（新增）(单个任务执行) strXmlPlan XML对象
     * @return void
     */
    public function M_InsertMonitorTaskPlanXML()
    {
    }

    /**
     * 委托任务申请（添加/编辑）
     * @return void
     */
    public function M_InsertMonitoringTask()
    {
    }

    /**
     * 运维任务基础信息（新增/编辑）
     * @return void
     */
    public function M_InsertOperationTask()
    {
    }

    /**
     * 运维任务设备（新增） strXmlPlan XML字符串
     * @return void
     */
    public function M_InsertOperationTaskDevices()
    {
    }

    /**
     * 运维任务设备（新增） strXmlPlan XML对象
     * @return void
     */
    public function M_InsertOperationTaskDevicesXML()
    {
    }

    /**
     * 运维任务计划（新增） strXmlPlan XML字符串
     * @return void
     */
    public function M_InsertOperationTaskPlan()
    {
    }

    /**
     * 运维记录上传
     * @return void
     */
    public function M_InsertOperationTaskPlanLog()
    {
    }

    /**
     * 运维任务计划（新增） strXmlPlan XML对象
     * @return void
     */
    public function M_InsertOperationTaskPlanXML()
    {
    }

    /**
     * 运维任务点位（新增） strXmlPlan XML字符串
     * @return void
     */
    public function M_InsertOperationTaskScheme()
    {
    }

    /**
     * 运维任务点位（新增）strXmlPlan XML对象
     * @return void
     */
    public function M_InsertOperationTaskSchemeXML()
    {
    }

    /**
     * 运维任务人员（新增） strXmlPlan XML字符串
     * @return void
     */
    public function M_InsertOperationTaskWorkers()
    {
    }

    /**
     * 运维任务人员（新增） strXmlPlan XML对象
     * @return void
     */
    public function M_InsertOperationTaskWorkersXML()
    {
    }

    /**
     * 采样管理（采样记录上传）strXmlPlan XML字符串
     * @return void
     */
    public function M_InsertPlanLog()
    {
    }

    /**
     * 采样管理（采样记录上传）strXmlPlan XML对象
     * @return void
     */
    public function M_InsertPlanLogXML()
    {
    }

    /**
     * 采样管理（补充说明附件）
     * @return void
     */
    public function M_InsertSampSupply()
    {
    }

    /**
     * 分析方法
     * @return void
     */
    public function M_MonitoringAnalysisMethod()
    {
    }

    /**
     * 采样方法
     * @return void
     */
    public function M_MonitoringSamplingMethod()
    {
    }

    /**
     * 监测任务类别
     * @return void
     */
    public function M_MonitoringTaskType()
    {
    }

    /**
     * 运维任务类别
     * @return void
     */
    public function M_OpenationTaskType()
    {
    }

    /**
     * 运维报告（异常中止）
     * @return void
     */
    public function M_OperationTaskAbortEnd()
    {
    }

    /**
     * 运维报告（完结）
     * @return void
     */
    public function M_OperationTaskEnd()
    {
    }

    /**
     * 运维任务提交
     * @return void
     */
    public function M_SubmitOperationTask()
    {
    }

    /**
     * 方案编制（提交）
     * @return void
     */
    public function M_SubmitPlan()
    {
    }

    /**
     * 采样管理（提交）
     * @return void
     */
    public function M_SubmitSamp()
    {
    }

    /**
     * 采样计划（提交）
     * @return void
     */
    public function M_SubmitSchedule()
    {
    }

    /**
     * 采样计划（计划采样日期） strXmlPlan XML字符串
     * @return void
     */
    public function M_UpdatePlanTime()
    {
    }

    /**
     * 采样计划（计划采样日期）strXmlPlan XML对象
     * @return void
     */
    public function M_UpdatePlanTimeXML()
    {
    }

    /**
     * 附件校验（1合同附件 2合同补充附件 3监测任务监测任务其他附件 4监测任务点位分布示意图 5监测任务方案附件 6监测任务采样补充说明文件 7监测任务检测报告 8监测任务数据报告（退回上阶段） 9监测任务采样图片）
     * @return void
     */
    public function VerifyFile()
    {
    }

    /**
     * 行政区域字典表
     * @return array
     * @throws \Exception
     */
    public function Z_CityInfo(): array
    {
        $region = new Region($this->config());
        return $region->Z_CityInfo();
    }

    /**
     * @return array
     */
    private function config(): array
    {
        return [
            'env' => $this->debug ? 'dev' : 'prod',
            'auth' => [
                'UserName' => $this->username,
                'PassWord' => $this->password,
            ]
        ];
    }
}
