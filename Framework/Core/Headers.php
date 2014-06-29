<?php

namespace Framework\Core;

class Headers
    extends \Framework\Defaults\DefaultClass
{
    private static $_headers = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private static $_allowedContentTypes = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;
    private static $_outputContentType = \Framework\Defaults\Type\String::DEFAULT_VALUE;

    public static function getHeaders()
    {
        return self::$_headers;
    }

    public static function setHeaders()
    {
        self::$_headers = apache_request_headers();
    }

    private static function checkContentType($contentType)
    {
        $contentTypeReturn = \Framework\Defaults\Type\String::DEFAULT_VALUE;

        switch($contentType)
        {
            case "json":
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::JSON;
                break;
            case "xml":
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::XML;
                break;
            case "html":
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::HTML;
                break;
            case "text":
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::PLAIN;
                break;
        }

        return $contentTypeReturn;
    }

    public static function setHeaderContentTypeOverride($url)
    {
        // explode url on dots
        $url = explode(FRAMEWORK_MVC_URL_PATTERN_RESPONSE_TYPE_SEPARATOR, $url);

        // override from extension, using pop so always checks the last addition.
        $extension = \Framework\Core\CoreFunctions::cleanURI(array_pop($url));

        if (in_array($extension, unserialize(FRAMEWORK_ALLOWED_RESPONSE_TYPES)) === true)
        {
            self::$_outputContentType = self::checkContentType($extension);
        }

        return (string)current($url);
    }

    public static function setAllowedContentTypes()
    {
        $contentTypes = unserialize(strtolower(FRAMEWORK_ALLOWED_RESPONSE_TYPES));

        for ($i = 0; $i < count($contentTypes); $i++)
        {
            array_push(self::$_allowedContentTypes, self::checkContentType($contentTypes[$i]));
        }
    }

    public static function getAllowedContentTypes()
    {
        return (array)self::$_allowedContentTypes;
    }
}