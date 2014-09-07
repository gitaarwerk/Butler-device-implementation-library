<?php

namespace Framework\DeviceView;

/**
 * Class View
 * @package Framework\DeviceView
 */
class DeviceView
    extends \Framework\Defaults\DefaultClass
{
    /**
     * @param \Framework\DeviceModel\DeviceModel $model
     * @param \Framework\Core\Request $request
     * @param \Framework\Core\Response $response
     */
//    abstract public function __construct(\Framework\DeviceModel\DeviceModel $model, \Framework\Core\Request $request, \Framework\Core\Response $response);
//
//    abstract public function showServerInformation();
//
//    abstract public function render();
//
//    abstract protected function getRequest();
//
//    abstract protected function setRequest(\Framework\Core\Request $value);
//
//    abstract protected function getResponse();
//
//    abstract protected function setResponse(\Framework\Core\Response $value);
//
//    abstract protected function setModel(\Framework\DeviceModel\DeviceModel $value);
//
//    abstract protected function getModel();

    final public function parse(\Framework\Core\Response $value)
    {
        $value->parse();
    }
}