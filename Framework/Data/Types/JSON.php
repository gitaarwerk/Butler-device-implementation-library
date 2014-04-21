<?php

namespace Framework\Data\Types;

class JSON extends \Framework\Defaults\DefaultClass
		implements \Framework\Interfaces\IDataformatter
{
	public $_data;
	
	public function setData($dataObject)
	{		
		if (file_exists($dataObject) === true) 
		{
			$data = file_get_contents($dataObject);
			$this->_data = json_decode($data);
			
			return $this;
		}
		else
		{
			\Framework\Defaults\Exceptions\Exception::Notice('No object set...');
		}			
	}
	
	public function getData()
	{
		return $this->_data;
	}
}

?>