<?php

declare(strict_types=1);

namespace Juling\Shemss\Monitoring;

use Juling\Shemss\Kernel\Provider;
use Juling\Shemss\Support\XML;
use Exception;

class MonitoringTaskType extends Provider
{
    /**
     * 监测任务类别
     *
     * <Items>
     * <Item>排污单位污染源自行监测</Item>
     * <Item>企事业单位排污状况自主调查监测</Item>
     * <Item>环境影响评价现状监测</Item>
     * <Item>建设项目竣工环保监测</Item>
     * <Item>环境损害鉴定评估监测</Item>
     * <Item>污染场地评估调查监测</Item>
     *
     * Items 列表
     * Item 类别名称
     * @return array
     * @throws Exception
     */
    public function M_MonitoringTaskType(): array
    {
        $response = $this->soap->M_MonitoringTaskType();
        $data = XML::parse($response->M_MonitoringTaskTypeResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return $data['Item'];
    }
}
