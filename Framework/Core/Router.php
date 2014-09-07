<?php

namespace Framework\Core;

/**
 * Class Router
 * @package Framework\Core
 */
class Router
    extends \Framework\Defaults\DefaultClass
{
    private $controller = \Framework\Defaults\Type\String::DEFAULT_VALUE;
    private $action = array();

    /**
     * @param $url
     * @param string $urlPatternMask
     */
    public function __construct($url, $urlPatternMask = FRAMEWORK_MVC_URL_PATTERN)
    {
        $url = $this->generateControllerFromUrl($url);

        $controllers = array();
        $actions = array();

        $urlArray = explode(FRAMEWORK_URL_PARTIAL_SEPARATOR, $url);

        $urlPatternMaskArray = explode(FRAMEWORK_MVC_URL_PATTERN_SEPARATOR, $urlPatternMask);

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
            $this->controller = FRAMEWORK_CLASS_ROOT_DIRECTORY . FRAMEWORK_CLASS_SEPARATOR . FRAMEWORK_CONTROLLER_DIRECTORY . FRAMEWORK_CLASS_SEPARATOR . $controllers;

            // sets action if there are any
            if (count($actions)  > 1)
            {
                $this->action = (array)$actions;
            }
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Error("Router has no routing information");
        }
    }

    /**
     * Returns a controller to dispatch.
     * @return \Framework\DeviceController\DeviceController Returns a controller to dispatch.
     */
    public function getController()
    {
        if (\Framework\Defaults\Type\String::isDefault($this->controller) !== true)
        {
            return (string)$this->controller;
        }
        else
        {
            return \Framework\Defaults\Exceptions\Exception::Error('No controller found...');
        }

    }

    /**
     * Generates a controller route from the URL.
     * @param string $url Generates a controller route from the URL.
     * @return string Generates a controller route from the URL.
     */
    public function generateControllerFromUrl($url)
    {
        // explode url on dots
        $url = explode(FRAMEWORK_MVC_URL_PATTERN_RESPONSE_TYPE_SEPARATOR, $url);

        // Only pops array when a response type url pattern is given.
        if (count($url) > 1)
        {
            array_pop($url);
        }

        return (string)current($url);
    }

    public function getAction()
    {
        return (array)$this->action;
    }
}
?>