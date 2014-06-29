<?php

namespace  Framework\Core;

class Headers
    extends \Framework\Defaults\DefaultClass
{
    private static $_headers = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private static $_acceptHeaderOverride = \Framework\Defaults\Type\String::DEFAULT_VALUE;

    public static function getHeaders()
    {
        return self::$_headers;
    }

    public static function setHeaders()
    {
        self::$_headers = apache_request_headers();
    }

    public static function setAcceptHeaderOverride($url)
    {
        $url = explode(FRAMEWORK_MVC_URL_PATTERN_RESPONSE_TYPE_SEPARATOR, $url);

        $extension = \Framework\Core\CoreFunctions::cleanURI(array_pop($url));

        if (in_array($extension, unserialize(FRAMEWORK_POSSIBLE_RESPONSE_TYPES)) === true)
        {
            self::$_acceptHeaderOverride = (string)$extension;
        }

        return (string)current($url);
    }
}