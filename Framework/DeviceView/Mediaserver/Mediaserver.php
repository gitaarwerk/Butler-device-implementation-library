<?php

namespace Framework\DeviceView\Mediaserver;

/**
 * Class View
 * @package Framework\DeviceView
 */
class Mediaserver
    extends \Framework\DeviceView\DeviceView
   // implements \Framework\Interfaces\Views\Mediaserver\Mediaserver
{
    private $modelInformation = "";

    private $model = \Framework\Defaults\Type\Object::DEFAULT_VALUE;

    /**
     * Request object
     * @var \Framework\Core\Response $request
     */
    private $request = \Framework\Defaults\Type\Object::DEFAULT_VALUE;

    /**
     * Response object
     * @var \Framework\Core\Response $response
     */
    private $response = \Framework\Defaults\Type\Object::DEFAULT_VALUE;

    /**
     * @param \Framework\DeviceModel\DeviceModel $model
     * @param \Framework\Core\Request $request
     * @param \Framework\Core\Response $response
     */
    public function __construct(\Framework\Core\Request $request, \Framework\Core\Response $response, \Framework\DeviceModel\DeviceModel $model)
    {
        $this->setRequest($request);
        $this->setResponse($response);
        $this->setModel($model);

        $this->showAvailableMediaLists();
    }

    /**
     * @return string
     */
    public function showServerInformation()
    {
        return $this->modelInformation;
    }

    /**
     *  Renders the output
     */
    public function render()
    {
        $output = $this->response;

        parent::parse($output);
    }

    /**
     *
     */
    public function showAvailableMediaLists()
    {
        /* @var \Framework\DeviceModel\Mediaserver\Plex\Listing\Movies $plex */
        $plex = $this->getModel()->getMedia("movies");
        $movielist = $plex->getMovieList();

        $this->response->addToOutput($movielist);
    }


    /**
     * @return \Framework\Core\Response
     */
    protected function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \Framework\Core\Response $value
     */
    protected function setResponse(\Framework\Core\Response $value)
    {
        $this->response = $value;
    }

    /**
     * @return \Framework\Core\Request
     */
    protected function getRequest()
    {
        return $this->request;
    }

    /**
     * @param \Framework\Core\Request $value
     */
    protected function setRequest(\Framework\Core\Request $value)
    {
        $this->request = $value;
    }

    /**
     * @return \Framework\DeviceModel\DeviceModel
     */
    protected function getModel()
    {
        return $this->model;
    }

    /**
     * @param \Framework\DeviceModel\DeviceModel $value
     */
    protected function setModel(\Framework\DeviceModel\DeviceModel $value)
    {
        $this->model = $value;
    }

}