<?php

namespace Framework\Build;

/**
 * Class DeviceConfiguration
 * @package Framework\Build
 */
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

    /**
     * @return string
     */
    public function getFriendlyName()
    {
        return (string)$this->_deviceConfiguration->friendlyName;
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return (string)$this->_deviceConfiguration->config->protocol;
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return (string)$this->_deviceConfiguration->config->hostname;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return (int)$this->_deviceConfiguration->config->port;
    }

    /**
     * @return string
     */
    public function getResponseType()
    {
        return (string)$this->_deviceConfiguration->config->responseType;
    }
}