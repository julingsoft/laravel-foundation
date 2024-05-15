<?php

declare(strict_types=1);

namespace Juling\Shemss\Contract;

use Juling\Shemss\Kernel\Provider;
use Juling\Shemss\Support\XML;
use Exception;

class Contract extends Provider
{
    /**
     * 合同基本信息（添加/新增）
     * @param ContractInput $contractInput
     * @return int
     * @throws Exception
     */
    public function C_InsertContractInfo(ContractInput $contractInput): int
    {
        $params = $contractInput->toArray();
        $response = $this->soap->__soapCall('C_InsertContractInfo', [$params]);
        $data = XML::parse($response->C_InsertContractInfoResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return $data['ID'];
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
        $params = ['CID' => $cid, 'FILENAME' => $fileName, 'FILENAMEOLD' => $fileNameOld];
        $response = $this->soap->__soapCall('C_InsertContractSupply', [$params]);
        $data = XML::parse($response->C_InsertContractSupplyResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return true;
    }

    /**
     * 合同补充说明附件（删除）
     * @param int $supply_id 补充说明编号 ID
     * @return bool
     * @throws Exception
     */
    public function C_DeleteContractSupply(int $supply_id): bool
    {
        $params = ['SUPPLY_ID' => $supply_id];
        $response = $this->soap->__soapCall('C_DeleteContractSupply', [$params]);
        $data = XML::parse($response->C_DeleteContractSupplyResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return true;
    }

    /**
     * 合同基本信息列表
     * @return array
     * @throws Exception
     */
    public function C_GetALLContractList(): array
    {
        $response = $this->soap->C_GetALLContractList();
        $data = XML::parse($response->C_GetALLContractListResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return $data['CONTRACT'];
    }
}
