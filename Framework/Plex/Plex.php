<?php

namespace Framework\Plex;


class Plex extends \Framework\Defaults\DefaultClass
{
	private $_url;
	private $_contents;
	private $_dataType;
	private $_listings;
	
	public function __construct($scheme, $hostname, $port)
	{	
		$urlBuilder = new \Framework\Builders\Url();
		$urlBuilder->setProtocol($scheme);
		$urlBuilder->setHostname($hostname);
		$urlBuilder->setPortnumber($port);
						
		$this->_url = $urlBuilder->getUrl();
	}

	/**
	* Gets the url for the media server.
	* @return string $this->_url  Returns the url of the media server.
	*/
	public function getUrl()
	{
		return $this->_url;
	}
	
	
	/**
	* Sets path to retreive listings on the media server.
	* @param string $path Sets the path for the media listings.
	*/
	public function setMediaListings($path)
	{
		$this->_listings = new \Framework\Plex\Contents\LibrarySections($path);
		
		return $this;
	}
	
	/**
	* Get library selections from the media server.
	* @return object \Framework\Plex\Contents\LibrarySection Returns the listings.
	*/
	public function getMediaListings()
	{
		return $this->_listings;
	}
	
}

?>