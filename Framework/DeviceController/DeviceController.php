<?php

namespace Framework\DeviceController;

abstract class DeviceController
    extends \Framework\Defaults\DefaultClass
    implements \Framework\Interfaces\Device\Configuration
{
    abstract public function __construct(array $configurationArray, array $actions, $arguments = "");
}