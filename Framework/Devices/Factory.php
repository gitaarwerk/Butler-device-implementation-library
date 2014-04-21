<?php

namespace Framework\Devices;

class Factory
{
	public static function build($builderObject, $dataType)
	{
		$dataloader = new \Framework\Data\Dataloader($builderObject, $dataType);
		$data = $dataloader->getData();	
		
		$device = '\\Framework\\Devices\\' . $data->device->type . '\\' . $data->device->type;
		
		if (class_exists($device)) {
            return new $device();
        }
        else {
            \Framework\Defaults\Exceptions\Exception("Invalid device type given.");
        }
	}
}

?>