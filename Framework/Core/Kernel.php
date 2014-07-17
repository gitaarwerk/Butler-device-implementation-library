<?php

namespace Framework\Core;

// may not extend default class
class Kernel
{
    private $_debug = array();
    private $_timer = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $_headers = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $_request = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $_response = \Framework\Defaults\Type\Object::DEFAULT_VALUE;

    public function __construct()
    {
        // execute settings
        $this->executeSettings();

        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            // Call execution timer to loop trough whole event and starts it
            $this->_timer = new \Framework\DebugTools\ExecutionTimer();
            $this->_timer->startTimer();
        }
    }

    public function startUp()
    {
        $this->setHeaders();

        $this->setRequest($this->getHeaders());
        $this->setResponse($this->getHeaders());
    }

    public function shutDown()
    {
        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            // set last execution timer and parse it
            $this->_timer->stopTimer();
            array_push($this->_debug, array("executionTime" => $this->_timer->parseExecutionTime()));
            array_push($this->_debug, array("classesCalled" => \Framework\DebugTools\ClassCount::Show()));

            echo '<pre>';
            var_dump($this->_debug);
            echo '</pre>';
        }

        return (bool)true;
    }

    private function executeSettings()
    {
        // execute development environment settings
        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            \Framework\DebugTools\ErrorReporting::startErrorReporting();
        }
    }

    public function setHeaders()
    {
        $this->_headers = new \Framework\Core\Headers();
    }

    /**
     * @return \Framework\Core\Headers
     */
    public function getHeaders()
    {
        return $this->_headers;
    }

    public function setRequest($headers)
    {
        $this->_request = new \Framework\Core\Request($headers);
    }

    public function setResponse($headers)
    {
        $this->_response = new \Framework\Core\Response($headers);
    }

    public function getRequest()
    {
        return $this->_request;
    }

    public function getResponse()
    {
        return $this->_response;
    }
}