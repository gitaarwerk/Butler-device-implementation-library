<?php

namespace Framework\DeviceController\Mediaserver;

class Plex
    extends \Framework\DeviceController\DeviceController
{
    private $_model;

    public function __init($arguments)
    {
        $config = $this->getConfiguration();

        $this->_model = new \Framework\DeviceModel\Mediaserver\Plex\Plex(
            $config->getFriendlyName(),
            $config->getScheme(),
            $config->getHostName(),
            $config->getPort(),
            $config->getResponseType()
        );

        $model = $this->_model;

        /* @var \Framework\DeviceModel\Mediaserver\Plex\Listing\Movies $movies */

        $movies = $model->getMedia("movies");
           var_dump($movies->getMovieList());

    }
}
?>