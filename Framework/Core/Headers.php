<?php

namespace Framework\Core;

/**
 * Class Headers
 * @package Framework\Core
 */
class Headers
    extends \Framework\Defaults\DefaultClass
{
    private $url = \Framework\Defaults\Type\String::DEFAULT_VALUE;
    private $headers = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $allowedContentTypes = array();
    private $outputContentType = \Framework\Defaults\Type\String::DEFAULT_VALUE;
    private $outputContentTypeOverride = \Framework\Defaults\Type\String::DEFAULT_VALUE;

    /**
     *
     */
    public function __construct($url)
    {
        $this->setUrl((string)$url);
        $headers = $this->obtainHeaders();

        $this->setHeaderContentTypeOverride($url);

        if (\Framework\Defaults\Type\ArrayCollection::isDefault($headers) === false)
        {
            $allowedContentTypes = $this->generateAllowedContentTypes();

            $this->setHeaders($headers);
            $this->setAllowedContentTypes($allowedContentTypes);

            $contentType = $this->generateContentType();

            if (\Framework\Defaults\Type\String::isDefault($contentType) === false)
            {
                $this->setContentType($contentType);
            }
        }
        else
        {
            echo \Framework\Defaults\Exceptions\Exception::Error("No headers set");
        }
    }

    /**
     * Returns a content type override whenever there is a valid and accepted extension in the URL.
     * @return string
     */
    private function getHeaderContentTypeOverride()
    {
        return $this->outputContentTypeOverride;
    }

    /**
     * Sets an override whenever there is a valid and accepted extension in the URL.
     * @param string $url The current URL to filter.
     * @return string Sets an override whenever there is a valid and accepted extension in the URL.
     */
    private function setHeaderContentTypeOverride($url)
    {
        // explode url on dots
        $url = explode(FRAMEWORK_MVC_URL_PATTERN_RESPONSE_TYPE_SEPARATOR, $url);


        // Only pops array when a response type url pattern is given.
        if (count($url) > 1)
        {
            // override from extension, using pop so always checks the last addition.
            $extension = array_pop($url);

            if ($this->isAllowedContentType($extension) === true)
            {
                $this->outputContentTypeOverride = $extension;
            }
        }
    }


    /**
     * Returns if the content type is allowed.
     * @param string $contentType Returns if the content type is allowed.
     * @return bool
     */
    private function isAllowedContentType($contentType)
    {
        return (bool)in_array((string)$contentType, $this->getAllowedContentTypes());
    }

    /**
     * Returns the allowed content types.
     * @return array Returns the allowed content types.
     */
    private function getAllowedContentTypes()
    {
        return $this->allowedContentTypes;
    }

    /**
     * Sets the allowed content types.
     * @param array $value Sets the allowed content types.
     */
    private function setAllowedContentTypes(array $value)
    {
        $this->allowedContentTypes = $value;
    }

    /** Generates the allowed content types.
     * @return array Generates the allowed content types.
     */
    private function generateAllowedContentTypes()
    {
        $allowedContentTypes = array();

        $contentTypes = unserialize(strtolower(FRAMEWORK_ALLOWED_RESPONSE_TYPES));

        for ($i = 0; $i < count($contentTypes); $i++)
        {
            array_push($allowedContentTypes, $contentTypes[$i]);
        }

        return (array)$allowedContentTypes;
    }

    /**
     * @param $value
     */
    private function setHeaders($value)
    {
        $this->headers = $value;
    }

    /**
     * @return null
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Returns the active content type.
     * @return string Returns the active content type.
     */
    public function getContentType()
    {
        return $this->outputContentType;
    }

    /**
     * Sets the active content type.
     * @param string $value Sets the active content type.
     */
    private function setContentType($value)
    {
        $this->outputContentType = $value;
    }

    private function generateContentType()
    {
        $contentType = \Framework\Defaults\Type\String::DEFAULT_VALUE;

        // returns the hardcoded override in Configuration.Local.php
        if (\Framework\Defaults\Type\String::isEmpty(FRAMEWORK_RESPONSE_OVERRIDE) === false && $this->isAllowedContentType(FRAMEWORK_RESPONSE_OVERRIDE) === true && FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            $contentType = FRAMEWORK_RESPONSE_OVERRIDE;
        }

        if (\Framework\Defaults\Type\String::isDefault($this->getHeaderContentTypeOverride()) === false && \Framework\Defaults\Type\String::isDefault($this->getHeaderContentTypeOverride()) === false && $this->isAllowedContentType($this->getHeaderContentTypeOverride()))
        {
            $contentType = $this->getHeaderContentTypeOverride();
        }

        if ($this->isAllowedContentType(FRAMEWORK_RESPONSE_DEFAULT) === true)
        {
            $contentType = FRAMEWORK_RESPONSE_DEFAULT;
        }

        return $contentType;
    }

    /**
     * @return mixed
     */
    private function obtainHeaders()
    {
        return apache_request_headers();
    }

    /**
     * Gets the current URL.
     * @return string Gets the current URL.
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the current URL.
     * @param string $value Sets the current URL.
     */
    private function setUrl($value)
    {
        $this->url = (string)$value;
    }
}