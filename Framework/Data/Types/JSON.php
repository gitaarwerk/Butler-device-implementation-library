<?php

namespace Framework\Data\Types;

/**
 * Class JSON
 * @package Framework\Data\Types
 */
class JSON
    extends \Framework\Defaults\DefaultClass
	implements \Framework\Interfaces\DataFormatter
{
	public $dataObject;

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
            $data = \Framework\Data\URLLoader::get($dataObject, '', 'json');
        }

        $this->dataObject = $this->decode($data);

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
	{
		return (array)$this->dataObject;
	}

    /**
     * Encodes to JSON
     * @param array $value
     * @return string
     */
    public function encode(array $value)
    {
        return json_encode($value);
    }

    /**
     * Decodes JSON
     * @param $value
     * @return mixed
     */
    public function decode($value)
    {
        return json_decode($value);
    }
}

?>