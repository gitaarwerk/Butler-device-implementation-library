<?php

namespace  Framework\Core;

class Headers
    extends \Framework\Defaults\DefaultClass
{
    private static $_headers = \Framework\Defaults\Type\Object::DEFAULT_VALUE;

    public static function getHeaders()
    {
        return self::$_headers;
    }

    public static function setHeaders()
    {
        self::$_headers = apache_request_headers();
    }
}