<?php

namespace Framework\Core;

class CoreFunctions
{
    private static function stripSlashesDeep($value)
    {
        echo 'done';

        $value = is_array($value) ? array_map("stripSlashesDeep", $value) : stripslashes($value);

        return $value;
    }

    public static function removeMagicQuotes()
    {
        if (get_magic_quotes_gpc() === true)
        {
            $_GET = self::stripSlashesDeep($_GET);
            $_POST = self::stripSlashesDeep($_POST);
            $_COOKIE = self::stripSlashesDeep($_COOKIE);
        }
    }

    /** Check register globals and remove them **/
    public static function unregisterGlobals()
    {
        if (ini_get('register_globals'))
        {
            $global_functions = array(
                '_SESSION',
                '_POST',
                '_GET',
                '_COOKIE',
                '_REQUEST',
                '_SERVER',
                '_ENV',
                '_FILES'
            );

            foreach ($global_functions as $value)
            {
                foreach ($GLOBALS[$value] as $key => $var)
                {
                    if ($var === $GLOBALS[$key])
                    {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    public static function controllerFactory($url)
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