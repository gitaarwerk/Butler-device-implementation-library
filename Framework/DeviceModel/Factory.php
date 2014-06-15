<?php

namespace Framework\DeviceModel;

/* @package Device factory */
class Factory
{
    /**
     * example of using @return with a class name
     * @param mixed $builderObject Object with data to load the device.
     * @param string $dataType Identifies the object source type (json/xml/object/array).
     * @return Parser|false phpDocumentor Parser object or error
     */
	public static function build($builderObject, $dataType)
	{
        /* @object \Framework\Data\Dataloader $dataloader */
		$dataloader = new \Framework\Data\Dataloader($builderObject, $dataType);
		$data = $dataloader->getData()->device;

		$device = '\\Framework\\DeviceModel\\' . $data->type . '\\' . $data->name . '\\' . $data->name;

		if (class_exists($device))
		{
            /* @return $device */
            return new $device(
                $data->friendlyName,
                $data->config->protocol,
                strtolower($data->config->hostname),
                $data->config->port,
                strtolower($data->config->responseType)
            );
        }
        else
        {
            \Framework\Defaults\Exceptions\Exception::Notice("Invalid device type given.");
        }
	}
}

?>