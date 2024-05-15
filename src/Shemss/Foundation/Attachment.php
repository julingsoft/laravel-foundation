<?php

declare(strict_types=1);

namespace Juling\Shemss\Foundation;

use Juling\Shemss\Kernel\Provider;
use Juling\Shemss\Support\XML;
use Exception;

class Attachment extends Provider
{
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
        $params = ['fileName' => $name, 'fileType' => $type];
        $response = $this->soap->__soapCall('CreateFile', [$params]);
        $data = XML::parse($response->CreateFileResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return $data['message'];
    }

    /**
     * 附件断点上传
     *
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
     * @param $buffer 文件流（byte[]）或 base64
     *
     * @return bool
     * @throws Exception
     */
    public function AppendFile(string $fileNameNew, int $fileType, $buffer): bool
    {
        $params = ['fileNameNew' => $fileNameNew, 'fileType' => $fileType, 'buffer' => $buffer];
        $response = $this->soap->__soapCall('AppendFile', [$params]);
        $data = XML::parse($response->AppendFileResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return true;
    }

    /**
     * 附件校验
     *
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
     * @param string $md5 文件流加密成32位Hash值 C#代码范例：
     * string md5Str = "";
     * FileStream fs = new FileStream(fileName, FileMode.Open,
     * FileAccess.ReadWrite, FileShare.ReadWrite);
     * MD5CryptoServiceProvider p = new MD5CryptoServiceProvider();
     * byte[] md5buffer = p.ComputeHash(fs);
     * fs.Close();
     * for (int i = 0; i < md5buffer.Length; i++)
     * {
     * md5Str += md5buffer[i].ToString("x2");
     * }
     * return md5Str;
     *
     * @return bool
     * @throws Exception
     */
    public function VerifyFile(string $fileNameNew, int $fileType, string $md5): bool
    {
        $params = ['fileNameNew' => $fileNameNew, 'fileType' => $fileType, 'md5' => $md5];
        $response = $this->soap->__soapCall('VerifyFile', [$params]);
        $data = XML::parse($response->VerifyFileResult->any);
        if (isset($data['succes']) && $data['succes'] === 'False') {
            throw new Exception($data['message']);
        }
        return true;
    }
}
