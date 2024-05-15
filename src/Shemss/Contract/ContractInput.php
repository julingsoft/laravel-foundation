<?php

declare(strict_types=1);

namespace Juling\Shemss\Contract;

class ContractInput
{
    /**
     * 合同 ID
     * 0 新增/ID 编辑；
     * 已提交合同不可编辑；
     * @var int
     */
    private int $ID;

    /**
     * 合同名称（测试合同 20191020）
     * @var string
     */
    private string $BT;

    /**
     * 合同性质（监测）
     * @var string
     */
    private string $XZ;

    /**
     * 委托方 ID（100706）
     * @var int
     */
    private int $JFBZ;

    /**
     * 合同金额（单位：元）
     * @var int
     */
    private int $JE;
    /**
     * 是否分包（0：否 1：是）
     * @var int
     */
    private int $IS_SUBPACKAGE;
    /**
     * 分包金额
     * @var int
     */
    private int $SUBPACKAGE_MONEY;
    /**
     * 履行周期开始
     * @var string
     */
    private string $ZQS;

    /**
     * 履行周期结束
     * @var string
     */
    private string $ZQZ;

    /**
     * 任务概述
     * @var string
     */
    private string $RWGS;

    /**
     * 操作类型：1 保存 3 提交
     * @var int
     */
    private int $IS_CHECK;

    /**
     * 附件原名称
     * @var string
     */
    private string $FileName;

    /**
     * 附件接口返回名称
     * @var string
     */
    private string $FilePath;

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     */
    public function setID(int $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getBT(): string
    {
        return $this->BT;
    }

    /**
     * @param string $BT
     */
    public function setBT(string $BT): void
    {
        $this->BT = $BT;
    }

    /**
     * @return string
     */
    public function getXZ(): string
    {
        return $this->XZ;
    }

    /**
     * @param string $XZ
     */
    public function setXZ(string $XZ): void
    {
        $this->XZ = $XZ;
    }

    /**
     * @return int
     */
    public function getJFBZ(): int
    {
        return $this->JFBZ;
    }

    /**
     * @param int $JFBZ
     */
    public function setJFBZ(int $JFBZ): void
    {
        $this->JFBZ = $JFBZ;
    }

    /**
     * @return int
     */
    public function getJE(): int
    {
        return $this->JE;
    }

    /**
     * @param int $JE
     */
    public function setJE(int $JE): void
    {
        $this->JE = $JE;
    }

    /**
     * @return int
     */
    public function getISSUBPACKAGE(): int
    {
        return $this->IS_SUBPACKAGE;
    }

    /**
     * @param int $IS_SUBPACKAGE
     */
    public function setISSUBPACKAGE(int $IS_SUBPACKAGE): void
    {
        $this->IS_SUBPACKAGE = $IS_SUBPACKAGE;
    }

    /**
     * @return int
     */
    public function getSUBPACKAGEMONEY(): int
    {
        return $this->SUBPACKAGE_MONEY;
    }

    /**
     * @param int $SUBPACKAGE_MONEY
     */
    public function setSUBPACKAGEMONEY(int $SUBPACKAGE_MONEY): void
    {
        $this->SUBPACKAGE_MONEY = $SUBPACKAGE_MONEY;
    }

    /**
     * @return string
     */
    public function getZQS(): string
    {
        return $this->ZQS;
    }

    /**
     * @param string $ZQS
     */
    public function setZQS(string $ZQS): void
    {
        $this->ZQS = $ZQS;
    }

    /**
     * @return string
     */
    public function getZQZ(): string
    {
        return $this->ZQZ;
    }

    /**
     * @param string $ZQZ
     */
    public function setZQZ(string $ZQZ): void
    {
        $this->ZQZ = $ZQZ;
    }

    /**
     * @return string
     */
    public function getRWGS(): string
    {
        return $this->RWGS;
    }

    /**
     * @param string $RWGS
     */
    public function setRWGS(string $RWGS): void
    {
        $this->RWGS = $RWGS;
    }

    /**
     * @return int
     */
    public function getISCHECK(): int
    {
        return $this->IS_CHECK;
    }

    /**
     * @param int $IS_CHECK
     */
    public function setISCHECK(int $IS_CHECK): void
    {
        $this->IS_CHECK = $IS_CHECK;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->FileName;
    }

    /**
     * @param string $FileName
     */
    public function setFileName(string $FileName): void
    {
        $this->FileName = $FileName;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->FilePath;
    }

    /**
     * @param string $FilePath
     */
    public function setFilePath(string $FilePath): void
    {
        $this->FilePath = $FilePath;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        foreach ($this as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }

}