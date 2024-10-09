<?php

declare(strict_types=1);

namespace Juling\Shemss\Monitoring;

use Juling\Shemss\Kernel\Provider;
use Exception;

class MonitoringSamplingMethod extends Provider
{
    /**
     * 采样方法
     *
     * <Items>
     * <Item>
     * <ID>1</ID>
     * <NAME>固定污染源废气监测技术 HJ/T397-2007</NAME>
     * </Item>
     * </Items>
     *
     * ID 采样方法 ID
     * NAME 采样方法名称
     *
     * @return array
     * @throws Exception
     */
    public function M_MonitoringSamplingMethod()
    {

    }
}
