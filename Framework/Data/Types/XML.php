<?php

namespace Framework\Data\Types;

/**
 * Class XML
 * @package Framework\Data\Types
 */
class XML
    extends \Framework\Defaults\DefaultClass
	implements \Framework\Interfaces\Dataformatter
{
	private $_dataObject;
	
	public function __construct()
	{
		$this->dataObject = \Framework\Defaults\Type\Object::DEFAULT_VALUE;
	}

    /**
     * @param $dataObject
     * @return $this
     */
    public function setData($dataObject)
	{
        // use file_get_contents for local data
        if (file_exists($dataObject) === true)
        {
            $data = file_get_contents($dataObject);
        }
        else
        {
            $data = \Framework\Data\URLLoader::get($dataObject, '', 'xml');
        }

		$this->dataObject = simplexml_load_string($data);

        return $this;
	}

    /**
     * @return null
     */
    public function getData()
	{
		return $this->dataObject;
	}

    /**
     * Encodes to JSON
     * @param array $value
     * @return string
     */
    public function encode(array $value)
    {
        // return json_encode($value);
    }

    /**
     * Decodes JSON
     * @param $value
     * @return mixed
     */
    public function decode($value)
    {
        // return json_decode($value);
    }
}

?>