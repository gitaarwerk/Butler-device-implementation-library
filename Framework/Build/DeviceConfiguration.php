<?php

namespace Framework\Build;

class DeviceConfiguration
    extends \Framework\Defaults\DefaultClass
{
    private $_deviceConfiguration = array();

    public function __construct(array $deviceConfigurationArray)
    {
        if (count($deviceConfigurationArray) > 0)
        {
            $this->_deviceConfiguration = $deviceConfigurationArray["device"];
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Error("No valid configuration found...");
        }
    }

    public function getFriendlyName()
    {
        return (string)$this->_deviceConfiguration->friendlyName;
    }

    public function getScheme()
    {
        return (string)$this->_deviceConfiguration->config->protocol;
    }
    public function getHostName()
    {
        return (string)$this->_deviceConfiguration->config->hostname;
    }

    public function getPort()
    {
        return (int)$this->_deviceConfiguration->config->port;
    }
    public function getResponseType()
    {
        return (string)$this->_deviceConfiguration->config->responseType;
    }
}