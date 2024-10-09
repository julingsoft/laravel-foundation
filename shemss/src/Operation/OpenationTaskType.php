<?php

declare(strict_types=1);

namespace Juling\Shemss\Operation;

use Juling\Shemss\Kernel\Provider;
use Juling\Shemss\Support\XML;
use Exception;

class OpenationTaskType extends Provider
{
    /**
     * 运维任务类别
     *
     * <Items>
     * <Item>
     * <ID>100000</ID>
     * <NAME>空气质量自动监测运维</NAME>
     * </Item>
     * <Item>
     * <ID>100001</ID>
     * <NAME>水环境自动监测运维</NAME>
     * </Item>
     *
     * ID 类别 ID
     * NAME 类别名称
     *
     * @return array
     * @throws Exception
     */
    public function M_OpenationTaskType(): array
    {
        $response = $this->soap->M_OpenationTaskType();
        $data = XML::parse($response->M_OpenationTaskTypeResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return $data['Item'];
    }
}
