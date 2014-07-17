<?php

namespace Framework\Core;

class Headers
    extends \Framework\Defaults\DefaultClass
{
    private $_headers = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $_allowedContentTypes = array();
    private $_outputContentType = \Framework\Defaults\Type\String::DEFAULT_VALUE;
    private $_outputContentTypeOverride = \Framework\Defaults\Type\String::DEFAULT_VALUE;

    public function __construct()
    {
        $this->setHeaders();
    }

    private function checkContentType($contentType)
    {
        $contentTypeReturn = \Framework\Defaults\Type\String::DEFAULT_VALUE;

        switch(strtolower($contentType))
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
            case "csv":
                $contentTypeReturn = \Framework\Build\HTTP\ContentType::CSV;
                break;
        }

        return $contentTypeReturn;
    }

    /**
     * Sets an override whenever there is a valid and accepted extension in the URL.
     * @param $url
     * @return string Sets an override whenever there is a valid and accepted extension in the URL.
     */
    public function setHeaderContentTypeOverride($url)
    {
        // explode url on dots
        $url = explode(FRAMEWORK_MVC_URL_PATTERN_RESPONSE_TYPE_SEPARATOR, $url);

        // only pops array when a response type url pattern is given.
        if (count($url) > 1)
        {
            // override from extension, using pop so always checks the last addition.
            $extension = \Framework\Core\CoreFunctions::cleanURI(array_pop($url));

            if (in_array($extension, unserialize(FRAMEWORK_ALLOWED_RESPONSE_TYPES)) === true)
            {
                $this->_outputContentTypeOverride = $this->checkContentType($extension);
            }
        }

        return (string)current($url);
    }

    public function getAllowedContentTypes()
    {
        return (array)$this->_allowedContentTypes;
    }

    public function setAllowedContentTypes()
    {
        $contentTypes = unserialize(strtolower(FRAMEWORK_ALLOWED_RESPONSE_TYPES));

        for ($i = 0; $i < count($contentTypes); $i++)
        {
            array_push($this->_allowedContentTypes, $this->checkContentType($contentTypes[$i]));
        }
    }

    public function getHeaders()
    {
        return $this->_headers;
    }

    public function setHeaders()
    {
        $this->_headers = apache_request_headers();
    }
}