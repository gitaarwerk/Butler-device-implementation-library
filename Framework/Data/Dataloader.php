<?php

namespace Framework\Data;

class Dataloader extends \Framework\Defaults\DefaultClass
{
	private $_dataObject;
	
	public function __construct($dataSource, $dataType)
	{
		if(\Framework\Defaults\Types\String::isDefault($dataSource) === false)
		{
			switch($dataType)
			{	
				case 'JSON':
					$dataObject = new \Framework\Data\Types\JSON();
										
					$this->_dataObject = $dataObject->setData($dataSource)->getData();
					break;
			}
		}
		else
		{
			return \Framework\Defaults\Exception\Exception("No datasource given...");
		}
	}
	
	public function getData()
	{
		return $this->_dataObject;
	}
}

?>