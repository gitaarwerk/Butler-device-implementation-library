<?php

namespace Framework\DeviceController;

abstract class DeviceController
    extends \Framework\Defaults\DefaultClass
{

    private $_configuration;

    final public function __construct(array $configurationArray, array $actions, $arguments = "")
    {
        // roep connector aan en geef controller mee als argument
        // indien gevonden heeft, geef dan een configuration file terug als array
        // haal ze dan door een loop heen om support voor functies te checken
        // $configfile = open connector()
        // $configfile->kijkNaarDevice()
        // heb ik configfile? zo ja, dan continue;

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

        $this->__init($arguments); // calls the __init() method in the same scope when extended.
    }

    abstract public function __init($arguments);

    final public function getConfiguration()
    {
        return $this->_configuration;
    }

//    abstract public function get(); // retreive
//    abstract public function put(); // update (change value)
//    abstract public function post(); // action (state)

//    abstract public function patch();
}
?>