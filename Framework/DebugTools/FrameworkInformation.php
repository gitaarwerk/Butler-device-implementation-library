<?php

namespace Framework\DebugTools;

class FrameworkInformation
    extends \Framework\Defaults\DefaultClass
{
    public static function Test
    {
        if(FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}