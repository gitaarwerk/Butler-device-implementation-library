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


            if (in_array($responseType, unserialize(FRAMEWORK_ALLOWED_RESPONSE_TYPES)) === true)
            {
                return $responseType;
            }
        }

        var_dump($serverAcceptHeader);

        // $acceptHeaders = \Framework\Defaults\Type\String::DEFAULT_VALUE;
           echo 'header accept:';
        $result = strpos($this->_headers["Accept"], "application/json");

        var_dump($result);
        echo '<hr>';
        var_dump($this->_headers["Accept"]);


    }
}