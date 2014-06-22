<?php

namespace Framework\DebugTools;

class ErrorReporting
    extends \Framework\Defaults\DefaultClass
{
    public static function startErrorReporting()
    {
        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            // set error reporting to true when in Debug mode
            ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(-1);
        }
        else
        {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', FRAMEWORK_ROOT_DIRECTORY . FRAMEWORK_DIRECTORY_SEPERATOR . 'Tmp' . FRAMEWORK_DIRECTORY_SEPERATOR . 'Logs' . FRAMEWORK_DIRECTORY_SEPERATOR . 'Error.log');
        }
    }
}