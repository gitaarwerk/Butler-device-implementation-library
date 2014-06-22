<?php

namespace Framework\DeviceController\Mediaserver;

class Plex
    extends \Framework\DeviceController\DeviceController
{
    private $_model;
    private $_configuration;

    public function __init($arguments)
    {
        echo 'Plex controller loaded...';


        $this->_model = new \Framework\DeviceModel\Mediaserver\Plex\Plex($friendlyName, $scheme, $hostname, $port, $responseType);
    }
}
?>