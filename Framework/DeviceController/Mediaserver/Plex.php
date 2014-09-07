<?php

namespace Framework\DeviceController\Mediaserver;

/**
 * Class Plex
 * @package Framework\DeviceController\Mediaserver
 */
class Plex
    extends \Framework\DeviceController\DeviceController
    implements  \Framework\Interfaces\Controller\HTTPMethods,
                \Framework\Interfaces\Controller\Configuration,
                \Framework\Interfaces\Controller\DeviceModel,
                \Framework\Interfaces\Controller\View
{
    private $configuration;
    private $model;
    private $view;

    /**
     * @param $configuration
     * @param array $actions
     * @param string $arguments
     */
    public function __construct(\Framework\Core\Request $request, \Framework\Core\Response $response, \Framework\Build\DeviceConfiguration $configuration, array $actions, $arguments = "")
    {
        $this->setConfiguration($configuration);

        $config = $this->getConfiguration();

        // make new deviceModel
        $plexDeviceModel = new \Framework\DeviceModel\Mediaserver\Plex\Plex(
            $config->getFriendlyName(),
            $config->getScheme(),
            $config->getHostName(),
            $config->getPort(),
            $config->getResponseType()
        );

        // set Model
        $this->setDeviceModel($plexDeviceModel);

        // attach device view
        $plexDeviceView = new \Framework\DeviceView\Mediaserver\Mediaserver($request, $response, $this->getDeviceModel());



        // Set View
        $this->setView($plexDeviceView);
    }

    public function Get()
    {

    }

    public function Post(){}
    public function Delete(){}
    public function Put(){}
    public function Patch(){}

    public function getView()
    {
        return $this->view;
    }

    public function setView(\Framework\DeviceView\DeviceView $value)
    {
        $this->view = $value;
    }

    /**
     * @return \Framework\DeviceModel\Mediaserver\Plex\Plex
     */
    public function getDeviceModel()
    {
        return $this->model;
    }

    /**
     * @param $deviceModel
     * @return $this
     */
    public function setDeviceModel($deviceModel)
    {
        $this->model = $deviceModel;

        return $this;
    }

    /**
     * @return \Framework\Build\DeviceConfiguration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param \Framework\Build\DeviceConfiguration $configuration
     * @return $this
     */
    public function setConfiguration($configuration)
    {
        if (\Framework\Defaults\Type\Object::isDefault($configuration) === false)
        {
            $this->configuration = $configuration;
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Error("No configuration set.");
        }

        return $this;
    }
}
?>