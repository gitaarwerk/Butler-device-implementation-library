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
    abstract public function __construct(\Framework\Core\Request $request, \Framework\Core\Response $response, \Framework\Build\DeviceConfiguration $configuration, array $actions, $arguments = "");
}