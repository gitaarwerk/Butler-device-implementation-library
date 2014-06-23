<?php

namespace Framework\Build;

class Dataloader
    extends \Framework\Defaults\DefaultClass
{
	private $_dataObject = array();
	
	public function __construct($dataSource, $dataType)
	{
		if(\Framework\Defaults\Type\String::isDefault($dataSource) === false)
		{
			$dataType = strtolower($dataType);
			
			switch($dataType)
			{	
				case 'json':
					$dataObject = new \Framework\Data\Types\JSON();
					$this->_dataObject = (array)$dataObject->setData($dataSource)->getData();
					break;
				case 'xml':
					$dataObject = new \Framework\Data\Types\XML();
					$this->_dataObject = (array)$dataObject->setData($dataSource)->getData();
					break;
			}
		}
	}
	
	public function getData()
	{
		return $this->_dataObject;
	}
}

?>