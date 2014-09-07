<?php

namespace Framework\Build\HTTP;

/**
 * Class ContentType
 * @package Framework\Build\HTTP
 */
class ContentType
{
    const CSV = "text/csv";
    const HTML = "text/html";
    const JSON = "application/json";
    const PLAIN = "text/plain";
    const XML = "application/xml";

    /**
     * @param $contentType
     * @return string
     */
    public static function convertToContentType($contentType)
    {
        $contentTypeReturn = \Framework\Defaults\Type\String::DEFAULT_VALUE;

        switch(strtoupper($contentType))
        {
            case strtoupper(FRAMEWORK_RESPONSE_JSON):
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::JSON;
                break;
            case strtoupper(FRAMEWORK_RESPONSE_XML):
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::XML;
                break;
            case strtoupper(FRAMEWORK_RESPONSE_HTML):
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::HTML;
                break;
            case strtoupper(FRAMEWORK_RESPONSE_PLAIN):
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::PLAIN;
                break;
            case strtoupper(FRAMEWORK_RESPONSE_CSV):
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::CSV;
                break;
        }

        return $contentTypeReturn;
    }
}