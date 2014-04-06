<?


abstract class Device extends Framework_Default_Class
{
	protected $_ipAddress = "0.0.0.0"; // ip v4
	protected $_friendlyName;
	protected $_deviceStatus = false;
	
	protected function __construct()
	{
		$this->_obtainIpAddress();
	}
	
	public function __toString()
	{
		return 'Yehh.. this is not good...';
	}
	
	public function __invoke()
	{
		return 'Yehh.. also not good... ';
	}
	
	abstract function on();	
	abstract function off();

	private function _obtainIpAddress()
	{
		$this->_ipAddress = (string) "20.10.99.99";
	}
	
	protected function getIpAddress()
	{
		return $this->_ipAddress;
	}
	
	public function getName()
	{
		return $this->_friendlyName;
	}	
	
	public function getDeviceStatus()
	{
		$status;
		
		if ($this->_deviceStatus === true)
		{
			$status = (string) " is turned on.";
		}
		else
		{
			$status = (string) " is turned off.";
		}
		
		return $this->_friendlyName . $status;
	}
}

?>