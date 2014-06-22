<?php

namespace Framework\Core;

class Request
    extends \Framework\Defaults\DefaultClass
{
    private static $_headerObject = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;

    public static function initialize()
    {
        // set response headers equal as accept headers
        self::$_headerObject =  apache_request_headers();
    }
}

?>