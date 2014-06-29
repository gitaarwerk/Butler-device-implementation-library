<?php

namespace Framework\Core;

class Request
{
    private $_headers = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;
    private $_allowedContentTypes = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;

    public function __construct()
    {
        $this->_headers = (array)\Framework\Core\Headers::getHeaders();

        $this->getAcceptHeaders();
    }

    public function getAcceptHeaders()
    {
        $serverAcceptHeader = explode(",", $this->_headers["Accept"]);

        for ($i = 0; $i < count($serverAcceptHeader); $i++)
        {
             $responseType = $serverAcceptHeader[$i];

            if (in_array($responseType, \Framework\Core\Headers::getAllowedContentTypes()) === true)
            {
                return $responseType;
            }
        }
    }
}