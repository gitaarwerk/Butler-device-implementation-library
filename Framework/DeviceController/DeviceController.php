<?php

namespace Framework\DeviceController;

abstract class DeviceController
    extends \Framework\Defaults\DefaultClass
{
    abstract public function __construct($configuration, array $actions, $arguments = "");
}