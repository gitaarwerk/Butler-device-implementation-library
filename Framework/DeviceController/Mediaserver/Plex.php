<?php

namespace Framework\DeviceController\Mediaserver;

class Plex
    extends \Framework\DeviceController\DeviceController
    implements  \Framework\Interfaces\Controller\HTTPMethods,
                \Framework\Interfaces\Controller\Configuration,
                \Framework\Interfaces\Controller\DeviceModel,
                \Framework\Interfaces\Controller\View
{
    private $_model;
    private $_configuration;

    public function __construct($configuration, array $actions, $arguments = "")
    {
        $this->setConfiguration($configuration);

        // make new deviceModel
        $plexDeviceModel = new \Framework\DeviceModel\Mediaserver\Plex\Plex(
            $this->_configuration->getFriendlyName(),
            $this->_configuration->getScheme(),
            $this->_configuration->getHostName(),
            $this->_configuration->getPort(),
            $this->_configuration->getResponseType()
        );

        $this->setDeviceModel($plexDeviceModel);

        /** @var \Framework\DeviceModel\Mediaserver\Plex\Listing\Movies $plex */
        $plex = $this->getDeviceModel()->getMedia("movies");

        $plex->getMovieList();
    }

    public function Get()
    {

    }

    public function Post(){}
    public function Delete(){}
    public function Put(){}
    public function Patch(){}

    public function getView(){}
    public function setView($view){}

    /**
     * @return \Framework\DeviceModel\Mediaserver\Plex\Plex
     */
    public function getDeviceModel()
    {
        return $this->_model;
    }

    public function setDeviceModel($deviceModel)
    {
        $this->_model = $deviceModel;

        return $this;
    }

    public function getConfiguration()
    {
        return $this->_configuration;
    }

    public function setConfiguration($configuration)
    {
        if (\Framework\Defaults\Type\Object::isDefault($configuration) === false)
        {
            $this->_configuration = $configuration;
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Error("No configuration set.");
        }

        return $this;
    }
}
?>