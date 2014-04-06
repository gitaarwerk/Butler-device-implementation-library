<?

class OnOffSwitch extends Device implements Button
{
	public function __construct($friendlyname)
	{
		parent::__construct();
		
		$this->_friendlyName = (string) $friendlyname; // (stirng) typecast kan ook framework default / constante zijn?
		
		// set device on, when instance created.
		$this->on();
	}
	
	public function on()
	{
		$this->_deviceStatus = true; // Dit kan een framework constante zijn?
		echo $this->_friendlyName . " is now turned on <br>";
		return $this;
	}
	
	public function off()
	{
		$this->_deviceStatus = false; // Dit kan een framework constante zijn?
		
		echo $this->_friendlyName . " is now turned off <br>";
		return $this;
	}
	
}

?>