<?php

namespace \Framework\Core;

class controllerFactory
{

    public static function Build($url)
    {
        if( \Framework\Defaults\Type\String::isDefault($url) === true)
        {
            \Framework\Defaults\Exceptions\Exception::Error('No url given');
            return;
        }

        $urlArray = array();
        $urlArray = explode("/", $url);

        $controller = ucwords($urlArray[0]);
        array_shift($urlArray);
        $action = $urlArray[0];
        array_shift($urlArray);
        $queryString = $urlArray;

        $controller = FRAMEWORK_CLASS_ROOT_NAME . FRAMEWORK_CLASS_SEPARATOR . FRAMEWORK_CONTROLLER_NAME . FRAMEWORK_CLASS_SEPARATOR . $controller;
        $model = rtrim($controller, 's');

        echo $controller;
        echo '<hr>';
        echo $model;

        $dispatch = new $controller($model, $controller, $action);

        if ((int)method_exists($controller, $action))
        {
            call_user_func_array(array($dispatch, $action), $queryString);
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Notice("no controller found..");
        }
    }
}

?>