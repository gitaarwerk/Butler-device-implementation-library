<?php

namespace Framework\DeviceController;

abstract class DeviceController
    extends \Framework\Defaults\DefaultClass
{

    final public function __construct(array $configurationArray, array $actions, $arguments = "")
    {
        $this->__init($arguments); // calls the __init() method in the same scope when extended.
    }

    abstract public function __init($arguments);

//    abstract public function get(); // retreive
//    abstract public function put(); // update (change value)
//    abstract public function post(); // action (state)

//    abstract public function patch();
}
?>