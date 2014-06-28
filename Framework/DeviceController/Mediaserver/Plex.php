<?php

namespace Framework\DeviceController\Mediaserver;

class Plex
    extends \Framework\DeviceController\DeviceController
{
    private $_model;
    private $_configuration;

    public function __construct(array $configurationArray, array $actions, $arguments = "")
    {
        $this->setConfiguration();

        $this->_model = new \Framework\DeviceModel\Mediaserver\Plex\Plex(
            $this->_configuration->getFriendlyName(),
            $this->_configuration->getScheme(),
            $this->_configuration->getHostName(),
            $this->_configuration->getPort(),
            $this->_configuration->getResponseType()
        );

        $movies = $this->_model->getMedia("movies");
        $list = $movies->getMovieList();
    }

    public function getConfiguration()
    {
        return $this->_configuration;
    }

    public function setConfiguration()
    {
        $dataLoader = new \Framework\Build\Dataloader(
            FRAMEWORK_ROOT_DIRECTORY . FRAMEWORK_DIRECTORY_SEPARATOR . "DeviceTemplates" . FRAMEWORK_DIRECTORY_SEPARATOR . "plex.json",
            "JSON"
        );

        $data = $dataLoader->getData();
        if (count($data) > 0)
        {
            $this->_configuration = new \Framework\Build\DeviceConfiguration($data);
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Error("no device found...");
        }
    }
}
?>