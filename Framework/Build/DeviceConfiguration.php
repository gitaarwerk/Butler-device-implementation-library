<?php

namespace Framework\Build;

/**
 * Class DeviceConfiguration
 * @package Framework\Build
 */
class DeviceConfiguration
    extends \Framework\Defaults\DefaultClass
{
    private $deviceConfiguration = array();

    /** Constructs the configuration of the device.
     * @param array $deviceConfigurationArray Constructs the configuration of the device.
     */
    public function __construct(array $deviceConfigurationArray)
    {
        if (count($deviceConfigurationArray) > 0)
        {
            $this->deviceConfiguration = $deviceConfigurationArray["device"];
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Error("No valid configuration found...");
        }
    }

    /**
     * Returns the friendly name of the device.
     * @return string Returns the friendly name of the device.
     */
    public function getFriendlyName()
    {
        return (string)$this->deviceConfiguration->friendlyName;
    }

    /**
     * Returns the scheme of the device.
     * @return string Returns the scheme of the device.
     */
    public function getScheme()
    {
        return (string)$this->deviceConfiguration->config->protocol;
    }

    /**
     * Returns the host name of the device.
     * @return string Returns the host name of the device.
     */
    public function getHostName()
    {
        return (string)$this->deviceConfiguration->config->hostname;
    }

    /**
     * Returns the port number of the device.
     * @return int Returns the port number of the device.
     */
    public function getPort()
    {
        return (int)$this->deviceConfiguration->config->port;
    }

    /**
     * Returns the response type of the device.
     * @return string Returns the response type of the device.
     */
    public function getResponseType()
    {
        return (string)$this->deviceConfiguration->config->responseType;
    }
}