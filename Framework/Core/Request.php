<?php

namespace Framework\Core;

/**
 * Class Request
 * @package Framework\Core
 */
class Request
{
    private $headers = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;
    private $allowedContentTypes = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;

    public function __construct(\Framework\Core\Headers $headers)
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

    /**
     *
     */
    public function setAllowedAcceptHeaders()
    {

    }

    /**
     * @param \Framework\Core\Headers $headers
     */
    public function setRequestHeaders(\Framework\Core\Headers $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return \Framework\Core\Headers Returns headers set by the request
     */
    public function getRequestHeaders()
    {
        return $this->headers;
    }
}