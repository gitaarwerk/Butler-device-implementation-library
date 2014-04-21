<?php

namespace Framework\Data;

class XMLData implements \Framework\Interfaces\IXMLData
{
	private $data;
	
	public function __construct()
	{
		$xml_categories = file_get_contents($category_url);
		$xml_categories = simplexml_load_string($xml_categories);
	}
	
	public function getData()
	{
		echo 'hier json data';
	}
}

?>