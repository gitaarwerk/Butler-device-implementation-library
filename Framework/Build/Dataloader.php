<?php

namespace Framework\Build;

/**
 * Class Dataloader
 * @package Framework\Build
 */
class Dataloader
    extends \Framework\Defaults\DefaultClass
{
	private $_dataObject = array();

    /**
     * @param $dataSource
     * @param $dataType
     */
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

    /**
     * @return array
     */
    public function getData()
	{
		return $this->_dataObject;
	}
}

?>