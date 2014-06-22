<?php

namespace Framework\DeviceView;

abstract class View
    extends \Framework\Defaults\DefaultClass
{
    private abstract $controller;
    private abstract $model;
}

?>