<?php

namespace Framework\Core;

class Response
    extends \Framework\Defaults\DefaultClass
{
    private static $_responseHeader;

    public static function initialize()
    {
        if (\Framework\Defaults\Type\String::isEmpty(FRAMEWORK_RESPONSE_OVERRIDE) === false)
        {
            $response_header = FRAMEWORK_RESPONSE_OVERRIDE;
        }
    }
}