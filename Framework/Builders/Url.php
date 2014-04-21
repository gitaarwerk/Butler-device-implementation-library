<?php

namespace Framework\Builders;

class Url 
	implements \Framework\Interfaces\IgetUrl
{
	private $_url = \Framework\Defaults\Types\String::DEFAULT_VALUE;
	private $_portnumber = \Framework\Defaults\Types\Int::DEFAULT_VALUE;
	private $_hostname = \Framework\Defaults\Types\String::DEFAULT_VALUE;
	private $_protocol = \Framework\Defaults\Types\String::DEFAULT_VALUE;
	
	private function _constructUrl()
	{
		if ( \Framework\Defaults\Types\String::isDefault($this->_protocol) === false )
		{
			$this->_url .= $this->_protocol . FRAMEWORK_URL_PROTOCOL_SEPARATOR; 
		}
		else
		{
			return false;
		}
		
		if ( \Framework\Defaults\Types\String::isDefault($this->_hostname) === false )
		{
			$this->_url .= $this->_hostname; 
		}
		else
		{
			return false;
		}
		
		if ( \Framework\Defaults\Types\Int::isDefault($this->_portnumber) === false )
		{
			$this->_url .= FRAMEWORK_URL_PORT_SEPARATOR . (string) $this->_portnumber;
		}
		
		$this->_url .= FRAMEWORK_URL_FOLDER_SEPARATOR;
		
		return true;		
	}
	
	public function setPortnumber($portnumber)
	{
		if ( \Framework\Defaults\Types\Int::isDefault($portnumber) === false)
		{
			$this->_portnumber = (int) $portnumber;
		}
		
		return $this;
	}
	
	public function setHostname($hostname)
	{
		if ( \Framework\Defaults\Types\String::isDefault($hostname) === false)
		{
			$this->_hostname = (string) $hostname;
		}
		
		return $this;
	}
	
	public function setProtocol($protocol)
	{
		if ( \Framework\Defaults\Types\String::isDefault($protocol) === false)
		{
			$this->_protocol = (string) $protocol;
		}
		
		return $this;	
	}
	
	public function getUrl()
	{
		if($this->_constructUrl() === true)
		{
			return $this->_url;
		}
		else
		{
			return \Framework\Defaults\Exceptions\Error("Url failed to build...");
		}
	}
}

?>