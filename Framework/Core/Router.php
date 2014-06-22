<?php

namespace Framework\Core;

class Router
{
    private $_deviceObject = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $_controller = \Framework\Defaults\Type\String::DEFAULT_VALUE;
    private $_action = array();

    public function __construct($url, $urlPatternMask = FRAMEWORK_MVC_URL_PATTERN)
    {
        $controller = array();

        $urlArray = explode("/", $url);
        $urlPatternMaskArray = explode("/", $urlPatternMask);

        for ($i = 0; $i < count($urlArray); $i++)
        {
            if (count($urlPatternMaskArray) > 0 && $urlPatternMaskArray[0] === 'controller')
            {
                // controller path
                array_push($controller, (string)ucfirst($urlArray[$i]));
                array_shift($urlPatternMaskArray);
            }
            else
            {
                // leftovers go into the actions
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
            return \Framework\Defaults\Exception\Error('No controller found...');
        }

    }

    /* @return array $this->_action */
    public function getAction()
    {
        return (array)$this->_action;
    }
}
?>