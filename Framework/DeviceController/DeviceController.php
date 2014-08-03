<?php

namespace Framework\DeviceController;

/**
 * Class DeviceController
 * @package Framework\DeviceController
 */
abstract class DeviceController
    extends \Framework\Defaults\DefaultClass
{
    /**
     * @param $configuration
     * @param array $actions
     * @param string $arguments
     */
    abstract public function __construct($configuration, array $actions, $arguments = "");
}