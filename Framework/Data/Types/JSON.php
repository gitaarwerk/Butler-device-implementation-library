<?php

namespace Framework\Data\Types;

class JSON
    extends \Framework\Defaults\DefaultClass
	implements \Framework\Interfaces\DataFormatter
{
	public $_dataObject;

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
            $data = \Framework\Data\URLLoader::get($dataObject, '', 'json');
        }

        $this->_dataObject = json_decode($data);

        return $this;
    }
	
	public function getData()
	{
		return $this->_dataObject;
	}
}

?>