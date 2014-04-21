<?php

namespace Framework\Data\Types;

class XML extends \Framework\Defaults\DefaultClass
		implements \Framework\Interfaces\IDataformatter
{
	private $_dataObject;
	
	public function __construct()
	{
		$this->_dataObject = \Framework\Defaults\Types\Object::DEFAULT_VALUE;
	}
	
	public function setData($dataObject)
	{		
		if (file_exists($dataObject) === true) 
		{
			$json_contents = file_get_contents($dataObject);
			$this->_dataObject = simplexml_load_string($json_contents);
			
			return $this;
		}
		else
		{
			\Framework\Defaults\Exceptions\Exception::Notice('No object set...');
		}			
	}
	
	public function getData()
	{
		return $this->_dataObject();
	}
}

?>