<?php

declare(strict_types=1);

namespace Juling\Foundation\Logging;

use Aliyun_Log_Client;
use Aliyun_Log_Models_LogItem;
use Aliyun_Log_Models_PutLogsRequest;
use Exception;
use Illuminate\Support\Facades\Context;
use Juling\Foundation\Constants\SystemConst;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

class SLSHandler extends AbstractProcessingHandler
{
    private Aliyun_Log_Client $client;

    private string $project;

    private string $logStore;

    public function __construct(array $config)
    {
        parent::__construct(Level::Debug);
        $this->client = $this->client($config);
        $this->project = $config['project'];
        $this->logStore = $config['log_store'];
    }

    /**
     * 阿里云日志客户端
     */
    protected function client(array $config): Aliyun_Log_Client
    {
        return new Aliyun_Log_Client(
            $config['endpoint'],
            $config['access_key_id'],
            $config['access_key_secret']
        );
    }

    /**
     * 处理日志记录，将其发送到阿里云日志服务。
     */
    protected function write(LogRecord $record): void
    {
        $request = request();
        $logItem = new Aliyun_Log_Models_LogItem;
        $logItem->setContents([
            'url' => $request->fullUrl(),
            'request' => json_encode($request->all(), JSON_UNESCAPED_UNICODE),
            'message' => $record['formatted'] ?? $record['message'],
            'context' => json_encode($record['context'], JSON_UNESCAPED_UNICODE),
            'level' => $record['level_name'],
            'channel' => $record['channel'],
            'datetime' => $record['datetime']->format('Y-m-d H:i:s.u'),
            'latency' => intval((microtime(true) - Context::getHidden(SystemConst::TraceTime)) * 1000), // 毫秒
            'traceId' => Context::getHidden(SystemConst::TraceId),
        ]);

        $request = new Aliyun_Log_Models_PutLogsRequest(
            $this->project,
            $this->logStore,
            '', // 主题，可为空
            '', // 来源 IP，可为空
            [$logItem]
        );

        try {
            $this->client->putLogs($request);
        } catch (Exception $e) {
            // 在这里处理异常，例如记录到本地文件或其他日志系统
            error_log('Failed to send log to Aliyun SLS: '.$e->getMessage());
        }
    }
}
