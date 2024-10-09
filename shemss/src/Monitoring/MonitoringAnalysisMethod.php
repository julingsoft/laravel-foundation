<?php

declare(strict_types=1);

namespace Juling\Shemss\Monitoring;

use Juling\Shemss\Kernel\Provider;
use Exception;

class MonitoringAnalysisMethod extends Provider
{
    /**
     * 分析方法
     *
     * <Items>
     * <Item>
     * <TYPEID>1005243</TYPEID>
     * <TYPENAME>水（含大气降水）和废水</TYPENAME>
     * <ITEMID>1005248</ITEMID>
     * <ITEMNAME>臭</ITEMNAME>
     * <METHODID>536</METHODID>
     * <METHODNAME>臭 臭阈值法《水和废水监测分析方法》（第四版）国家环境保护总局 （2002 年）</METHODNAME>
     * </Item>
     *
     * TYPEID 所属分类 ID
     * TYPENAME 所属分类名称
     * ITEMID 项目名称 ID
     * ITEMNAME 项目名称
     * METHODID 监测方法 ID（后续任务中的分析方法 ID）
     * METHODNAME 监测方法
     *
     * @return array
     * @throws Exception
     */
    public function M_MonitoringAnalysisMethod()
    {

    }
}
