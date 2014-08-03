<?php

namespace Framework\DeviceModel\Hue;

/**
 * Class Hue
 * @package Framework\DeviceModel\Hue
 */
class Hue
    extends \Framework\DeviceModel\Device
{
	private $_url;

    /**
     * @param $scheme
     * @param $hostname
     * @param $port
     */
    public function __construct($scheme, $hostname, $port)
	{	
		$urlBuilder = new \Framework\Build\Url();
		$urlBuilder->setProtocol($scheme);
		$urlBuilder->setHostname($hostname);
		$urlBuilder->setPortnumber($port);
						
		$this->_url = $urlBuilder->getUrl();
		
		echo 'hue initialized';
	}

	/**
	* Gets the url for the media server.
	* @return string $this->_url  Returns the url of the media server.
	*/
	public function getUrl()
	{
		return $this->_url;
	}

    /**
     *
     */
    public function setColors()
	{
		$command = $this->_url . 'api/newdeveloper/lights/65535';
		// echo fopen($command, "r");
		$response = file_get_contents("php://20.10.1.46/api/newdeveloper/lights/2/state/hue/25000");
		// var_dump(json_decode($response));
	}
	
}

?>