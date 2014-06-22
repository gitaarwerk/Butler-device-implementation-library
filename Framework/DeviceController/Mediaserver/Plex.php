<?php

namespace Framework\DeviceController\Mediaserver;

class Plex
    extends \Framework\DeviceController\DeviceController
{
    private $_model;

    public function __construct($actions)
    {
        echo 'Plex controller loaded...';
        // $friendlyName, $scheme, $hostname, $port, $responseType

        $this->_model = new \Framework\DeviceModel\Mediaserver\Plex\Plex($friendlyName, $scheme, $hostname, $port, $responseType);
    }
}
?>