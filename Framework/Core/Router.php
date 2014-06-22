<?php

namespace Framework\Core;

class Router
{
    private $_controller = \Framework\Defaults\Type\String::DEFAULT_VALUE;
    private $_action = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;

    public function __construct($url, $urlPatternMask = FRAMEWORK_MVC_URL_PATTERN)
    {
        $controllers = array();
        $actions = array();

        $urlArray = explode(FRAMEWORK_URL_PARTIAL_SEPARATOR, $url);
        $urlPatternMaskArray = explode("/", $urlPatternMask);

        if (count($urlArray) > 0 && count($urlPatternMaskArray) > 0)
        {
            for ($i = 0; $i < count($urlArray); $i++)
            {
                if (count($urlPatternMaskArray) > 0 && $urlPatternMaskArray[0] === FRAMEWORK_MVC_URL_PATTERN_CONTROLLER)
                {
                    // controller path
                    array_push($controllers, (string)ucfirst($urlArray[$i]));
                    array_shift($urlPatternMaskArray);
                }
                else
                {
                    if (\Framework\Defaults\Type\String::isEmpty($urlArray[$i]) === false)
                    {
                        // leftovers get pushed into the actions array
                        array_push($actions, (string)ucfirst($urlArray[$i]));
                    }
                }
            }

            // glue arrays back together
            $controllers = implode(FRAMEWORK_CLASS_SEPARATOR, $controllers);
            $this->_controller = (string)FRAMEWORK_CLASS_ROOT_DIRECTORY . FRAMEWORK_CLASS_SEPARATOR . FRAMEWORK_CONTROLLER_DIRECTORY . FRAMEWORK_CLASS_SEPARATOR . $controllers;

            // sets action if there are any
            if (count($actions)  > 1)
            {
                $this->_action = (array)$actions;
            }
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Error("Router has no routing information");
        }
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