<?php

namespace Framework\Plex\Contents;

class LibrarySections
{
	private $_path;
	
	public function __construct($path)
	{
		$this->_path = $path;
	}
	
	public function getFullList()
	{
		return 'eus';
	}
}

?>