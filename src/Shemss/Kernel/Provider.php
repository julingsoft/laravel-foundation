<?php

declare(strict_types=1);

namespace Juling\Shemss\Kernel;

use SoapClient;

class Provider
{
    /**
     * @var SoapClient
     */
    protected SoapClient $soap;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->soap = (new Soap())->client($config);
    }
}
