<?php

namespace Framework\DeviceController;

class Controller
{
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;

    function __construct($model, $controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_model = $model;
    }

//    function set($name, $value) {
//        $this->_template->set($name,$value);
//    }

    function __destruct() {
        $this->_template->render();
    }
}
?>