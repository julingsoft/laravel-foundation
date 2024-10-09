<?php

declare(strict_types=1);

namespace Juling\Shemss\Operation;

use Juling\Shemss\Kernel\Provider;
use Exception;

class OperationScheme extends Provider
{
    /**
     * 运维点位列表
     *
     * <Items>
     * <Item>
     * <ID>100000</ID>
     * <OTID>100000</OTID>
     * <MC>宝庆路站</MC>
     * <CODE>9001</CODE>
     * <ADDRESS>上海/俆汇区</ADDRESS>
     * <LATITUDE>31.19240</LATITUDE>
     * <LONGITUDE>121.42700</LONGITUDE>
     * </Item>
     * </Items>
     *
     * ID 点位 ID
     * OTID 任务类别 ID
     * MC 点位名称
     * CODE 测试代码
     * ADDRESS 地址
     * LATITUDE 维度
     * LONGITUDE 经度
     *
     * @return array
     * @throws Exception
     */
    public function M_GetOperationSchemeList()
    {

    }
}
