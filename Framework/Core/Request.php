<?php

namespace Framework\Core;

class Request
{
    private $headers = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;
    private $_allowedContentTypes = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;

    public function __construct($headers)
    {
        $this->setRequestHeaders($headers);
    }

//    private function determineAllowedAcceptHeaders($acceptHeaders)
//    {
//        $acceptHeaders = $this->getAcceptHeaders();
//
//        $serverAcceptHeader = explode(",", $acceptHeaders);
//
//        for ($i = 0; $i < count($serverAcceptHeader); $i++)
//        {
//             $responseType = $serverAcceptHeader[$i];
//
//            if (in_array($responseType, \Framework\Core\Headers::getAllowedContentTypes()) === true)
//            {
//                return $responseType;
//            }
//        }
//    }

    public function setAllowedAcceptHeaders()
    {

    }

    public function setRequestHeaders($headers)
    {
        $this->headers = (array)$headers;
    }

    /**
     * @return array $this->headers Returns headers set by the request
     */
    public function getRequestHeaders()
    {
        return $this->headers;
    }
}