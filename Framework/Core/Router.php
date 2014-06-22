<?php

namespace Framework\Core;

class Router
{
    private $_controller = \Framework\Defaults\Type\String::DEFAULT_VALUE;
    private $_action = array();

    public function __construct($url, $urlPatternMask = FRAMEWORK_MVC_URL_PATTERN)
    {
        $controller = array();

        $urlArray = explode(FRAMEWORK_URL_PARTIAL_SEPARATOR, $url);
        $urlPatternMaskArray = explode("/", $urlPatternMask);

        for ($i = 0; $i < count($urlArray); $i++)
        {
            if (count($urlPatternMaskArray) > 0 && $urlPatternMaskArray[0] === FRAMEWORK_MVC_URL_PATTERN_CONTROLLER)
            {
                // controller path
                array_push($controller, (string)ucfirst($urlArray[$i]));
                array_shift($urlPatternMaskArray);
            }
            else
            {
                // leftovers get pushed into the actions array
                array_push($this->_action, (string)ucfirst($urlArray[$i]));
            }
        }

        // glue arrays back together
        $controller = implode(FRAMEWORK_CLASS_SEPARATOR, $controller);
        $this->_controller = FRAMEWORK_CLASS_ROOT_DIRECTORY . FRAMEWORK_CLASS_SEPARATOR . FRAMEWORK_CONTROLLER_DIRECTORY . FRAMEWORK_CLASS_SEPARATOR . $controller;
    }

    /* @return string $this->_action */
    public function getController()
    {
        if (\Framework\Defaults\Type\String::isDefault($this->_controller) !== true)
        {
            return (string)$this->_controller;
        }
        else
        {
            return \Framework\Defaults\Exceptions\Exception::Error('No controller found...');
        }

    }

    /* @return array $this->_action */
    public function getAction()
    {
        return (array)$this->_action;
    }
}
?>