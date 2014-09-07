<?php

namespace Framework\Core;

/**
 * Class Response
 * @package Framework\Core
 */
class Response
    extends \Framework\Defaults\DefaultClass
{

    /**
     * The response type to be outputted
     * @var string
     */
    private $responseType;

    /**
     * The output headers
     * @var string $outputHeader The output headers.
     */
    private $outputHeader = "";

    /**
     * Output container.
     * @var array $outputBody Output container.
     */
    private $outputBody = array();

    /**
     * Debug information container that will be added at the beginning of it.
     * @var array
     */
    private $debugInformationAtBegin = array();

    /**
     * Debug information container.
     * @var array
     */
    private $debugInformation = array();

    /**
     * Debug information container that will be added at the end of it.
     * @var array
     */
    private $debugInformationAtEnd = array();

    /**
     * The Headers object.
     * @var \Framework\Core\Headers $headerObject The Headers object.
     */
    private $headerObject = \Framework\Defaults\Type\Object::DEFAULT_VALUE;

    /**
     * @param \Framework\Core\Headers $headers
     */
    public function __construct(\Framework\Core\Headers $headers)
    {
        if (\Framework\Defaults\Type\String::isEmpty(FRAMEWORK_RESPONSE_OVERRIDE) === false)
        {
            $this->responseType = FRAMEWORK_RESPONSE_OVERRIDE;

            // return if response headers are overridden.
            return;
        }

        $this->setRequestHeaders($headers);

        // sets the response type
        $this->setResponseType($this->getRequestHeaders()->getContentType());
    }

    /**
     * Adds debug information at the end.
     * @param array $value Adds debug information at the end.
     */
    public function addDebugInformationAtEnd(array $value)
    {
        $this->debugInformationAtEnd = $this->debugInformationAtEnd + $value;
    }

    /**
     * Adds debug information at the begin.
     * @param array $value Adds debug information at the begin.
     */
    public function addDebugInformationAtBegin(array $value)
    {
        $this->debugInformationAtBegin = $value + $this->debugInformationAtBegin;
    }

    /**
     * Adds debug information.
     * @param array $value Adds debug information.
     */
    public function addDebugInformation(array $value)
    {
        $this->debugInformation = $this->debugInformation + $value;
    }

    /**
     * Returns debug information.
     * @return array Returns debug information.
     */
    private function parseDebugInformation()
    {
        return $this->debugInformationAtBegin + $this->debugInformation + $this->debugInformationAtEnd;
    }

    public function addToOutput(array $value)
    {
        $this->outputBody = $this->outputBody + $value;
    }

    private function generateOutPut()
    {
        return $this->parseDebugInformation() + $this->outputBody;
    }

    /**
     * Parses the output to the screen.
     */
    public function parse()
    {
        $output = (array)$this->generateOutPut();
        $render = "";

        $responseType = $this->getResponseType();

        switch ($responseType)
        {
            case FRAMEWORK_RESPONSE_JSON:
                $render = new \Framework\Data\Types\JSON();
                break;
            case FRAMEWORK_RESPONSE_XML:
                $render = new \Framework\Data\Types\XML();
                break;
            case FRAMEWORK_RESPONSE_CSV:
                $render = new \Framework\Data\Types\CSV();
                break;
            case FRAMEWORK_RESPONSE_HTML:
                $render = new \Framework\Data\Types\HTML();
                break;
            case FRAMEWORK_RESPONSE_PLAIN:
                $render = new \Framework\Data\Types\PLAIN();
                break;
        }

        $this->createResponseHeader();

        echo $render->encode($output);
    }

    /**
     * Returns the response type.
     * @return string Returns the response type.
     */
    private function getResponseType()
    {
        return $this->responseType;
    }

    /** Sets the response type.
     * @param string $value Sets the response type.
     */
    private function setResponseType($value)
    {
        $this->responseType = (string)$value;
    }

    private function createResponseHeader()
    {
        $responseType = $this->getResponseType();

        // We'll be outputting a PDF
        header("Content-type: " . $responseType);
    }

    /**
     * Returns the request header object.
     * @return \Framework\Core\Headers Returns the request header object.
     */
    private function getRequestHeaders()
    {
        return $this->headerObject;
    }

    /**
     * Sets the request header object.
     * @param Headers $value Sets the request header object.
     */
    private function setRequestHeaders(\Framework\Core\Headers $value)
    {
        $this->headerObject = $value;
    }
}