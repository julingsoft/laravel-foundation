<?php

declare(strict_types=1);

namespace Juling\Shemss\Kernel;

use SoapClient;
use SoapFault;
use SoapHeader;

class Soap
{
    /**
     * 接口地址
     * @var array
     */
    public array $webService = [
        'dev' => 'http://218.242.55.138:10077/WebService1/WebService.asmx?WSDL',
        'prod' => 'http://218.242.55.138:10001/WebService1/WebService.asmx?WSDL',
    ];

    public function client(array $config)
    {
        try {
            $endpoint = $this->webService[$config['env']];
            $soapClient = new SoapClient($endpoint, ['location' => $endpoint]);
            $soapHeader = new SoapHeader('http://tempuri.org/', 'IsValidSoapHeader', $config['auth']);
            $soapClient->__setSoapHeaders([$soapHeader]);
            return $soapClient;
        } catch (SoapFault $e) {
            die($e->getMessage());
        }
    }
}
