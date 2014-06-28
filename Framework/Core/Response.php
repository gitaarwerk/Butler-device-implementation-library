<?php

namespace Framework\Core;

class Response
    extends \Framework\Defaults\DefaultClass
{
    private $_responseHeader;

    public function __construct()
    {
        if (\Framework\Defaults\Type\String::isEmpty(FRAMEWORK_RESPONSE_OVERRIDE) === false)
        {
            $this->_responseHeader = FRAMEWORK_RESPONSE_OVERRIDE;

            // return if response headers are overridden.
            return;
        }

        $this->setResponseHeader();
    }

    private function setResponseHeader()
    {
        $this->_responseHeader = \Framework\Core\Headers::getHeaders();
    }
}