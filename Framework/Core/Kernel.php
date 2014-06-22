<?php

namespace Framework\Core;

// may not extend default class
class Kernel
{
    private static $_debug = array();
    private static $_timer;

    public static function Start()
    {
        // execute settings
        self::_executeSettings();

        // start request handling...
        \Framework\Core\Request::initialize();

        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            // Call execution timer to loop trough whole event and starts it
            self::$_timer = new \Framework\DebugTools\ExecutionTimer();
            self::$_timer->startTimer();
        }

        return (bool)true;
    }

    public static function Stop()
    {
        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            // set last execution timer and parse it
            self::$_timer->stopTimer();
            array_push(self::$_debug, array("executionTime" => self::$_timer->parseExecutionTime()));
            array_push(self::$_debug, array("classesCalled" => \Framework\DebugTools\ClassCount::Show()));

            echo '<pre>';
            var_dump(self::$_debug);
            echo '</pre>';
        }

        return (bool)true;
    }

    private static function _executeSettings()
    {
        // execute development environment settings
        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            \Framework\DebugTools\ErrorReporting::startErrorReporting();
        }
    }
}

?>