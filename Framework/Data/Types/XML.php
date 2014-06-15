<?php

namespace Framework\Data\Types;

class XML
    extends \Framework\Defaults\DefaultClass
	implements \Framework\Interfaces\Dataformatter
{
	private $_dataObject;
	
	public function __construct()
	{
		$this->_dataObject = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
	}
	
	public function setData($dataObject)
	{
        $data = '';

        // use file_get_contents for local data
        if (file_exists($dataObject) === true)
        {
            $data = file_get_contents($dataObject);
        }
        else
        {
            $data = \Framework\Data\URLLoader::get($dataObject, '', 'xml');
        }

		$this->_dataObject = simplexml_load_string($data);

        return $this;
	}
	
	public function getData()
	{
		return $this->_dataObject;
	}
}

?>