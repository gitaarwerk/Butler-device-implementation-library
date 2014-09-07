<?php

namespace Framework\Core;

// may not extend default class

/**
 * Class Kernel
 * @package Framework\Core
 */
class Kernel
{
    private $debug = array();
    private $timer = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $headers = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $request = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
    private $response = \Framework\Defaults\Type\Object::DEFAULT_VALUE;

    /**
     *
     */
    public function __construct(\Framework\Core\Headers $headers)
    {
        // execute settings
        $this->executeSettings();

        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            // Call execution timer to loop trough whole event and starts it
            $this->timer = new \Framework\DebugTools\ExecutionTimer();
            $this->timer->startTimer();
        }

        $this->setHeaders($headers);
    }

    /**
     * Starts up the initialisation process.
     * @return bool
     */
    public function startUp()
    {
        $request = new \Framework\Core\Request($this->getHeaders());
        $response = new \Framework\Core\Response($this->getHeaders());

        $this->setRequest($request);
        $this->setResponse($response);

        return true;
    }

    /**
     * Shuts down.
     * @return bool
     */
    public function shutDown()
    {
        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            // set last execution timer and parse it
            $this->timer->stopTimer();
            array_push($this->debug, array("executionTime" => $this->timer->parseExecutionTime()));
            array_push($this->debug, array("classesCalled" => \Framework\DebugTools\ClassCount::Show()));

            $response = $this->getResponse();

            $response->addDebugInformationAtEnd($this->debug);
        }

        return true;
    }

    /**
     *
     */
    private function executeSettings()
    {
        // execute development environment settings
        if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
        {
            \Framework\DebugTools\ErrorReporting::startErrorReporting();
        }
    }

    /**
     * @param \Framework\Core\Headers $value
     */
    public function setHeaders(\Framework\Core\Headers $value)
    {
        $this->headers = $value;
    }

    /**
     * @return \Framework\Core\Headers $value
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param \Framework\Core\Request $value
     */
    public function setRequest(\Framework\Core\Request $value)
    {
        $this->request = $value;
    }

    /**
     * @param \Framework\Core\Response $value
     */
    public function setResponse(\Framework\Core\Response $value)
    {
        $this->response = $value;
    }


    /**
     * @return \Framework\Core\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return \Framework\Core\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}