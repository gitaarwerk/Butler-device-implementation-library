<?php

namespace Framework\Core;

class Request
{
    private $_headers = \Framework\Defaults\Type\ArrayCollection::DEFAULT_VALUE;

    public function __construct()
    {
        $this->_headers = (array) \Framework\Core\Headers::getHeaders();


        // var_dump($this->_headers["Accept"]);
        $this->getAcceptHeaders();
    }

    public function getAcceptHeaders()
    {
        echo $_SERVER['HTTP_ACCEPT'];
        // $acceptHeaders = \Framework\Defaults\Type\String::DEFAULT_VALUE;
           echo 'header accept:';
        $result = strpos($this->_headers["Accept"], "xml");

        var_dump($result);
        echo '<hr>';
        var_dump($this->_headers["Accept"]);


    }
}