<?php

namespace Framework\DeviceModel\Mediaserver\Plex;

const LIBRARY_URLPART = '/library';
const LIBRARY_SECTION_URLPART = '/sections';
const LIBRARY_LISTING_MOVIE_TYPE = 'movie';
const LIBRARY_LISTING_MUSIC_TYPE = 'artist';
const LIBRARY_LISTING_PHOTO_TYPE = 'photo';
const LIBRARY_LISTING_TVSHOW_TYPE = 'show';

const LIBRARY_LISTING_RECENTLY_ADDED = '/recentlyAdded'; // recently added items
const LIBRARY_LISTING_NEWEST = '/newest'; // recently released
const LIBRARY_LISTING_ALL = '/all'; // view all
const LIBRARY_LISTING_BY_COLLECTION = '/collection'; // view all by folder

/**
 * Class Plex
 * @package Framework\DeviceModel\Mediaserver\Plex
 */
class Plex
    extends \Framework\DeviceModel\DeviceModel
{
	private $_url;
	private $_contents;
	private $_responseType;

    private $_movies = array();
    private $_tvshows = array();
    private $_photos = array();
    private $_music = array();

    /**
     * @param $friendlyName
     * @param $scheme
     * @param $hostname
     * @param $port
     * @param $responseType
     */
    public function __construct($friendlyName, $scheme, $hostname, $port, $responseType)
	{
        // set responseType and friendly name
        $this->_responseType = $responseType;
        $this->_friendlyName = $friendlyName;

        // initialize url of service
        $urlBuilder = new \Framework\Build\Url();
		$urlBuilder->setProtocol($scheme);
		$urlBuilder->setHostname($hostname);
		$urlBuilder->setPortnumber($port);
						
		$this->_url = $urlBuilder->getUrl();

        // initialize media library
        $this->_initMedia();
	}

    /**
     *
     */
    private function _initMedia()
    {
        $sectionUrl = $this->_url . \Framework\DeviceModel\Mediaserver\Plex\LIBRARY_URLPART . \Framework\DeviceModel\Mediaserver\Plex\LIBRARY_SECTION_URLPART;

        /* @var \Framework\Data\Dataloader($sectionUrl, $responseType) $dataloader*/
        $dataLoader = new \Framework\Build\Dataloader($sectionUrl, $this->_responseType);
        $contents = $dataLoader->getData();

        // initialize folders
        /* @var object $folders */
        foreach ($contents["_children"] as $folders)
        {
            $url = $sectionUrl . '/' . $folders->key;

            switch ($folders->type)
            {
                case \Framework\DeviceModel\Mediaserver\Plex\LIBRARY_LISTING_MOVIE_TYPE:
                    array_push($this->_movies,
                        array(
                            'id' => $folders->key,
                            'title' => $folders->title,
                            'url' => $url,
                            'responseType' => $this->_responseType
                        )
                    );
                    break;
                case \Framework\DeviceModel\Mediaserver\Plex\LIBRARY_LISTING_MUSIC_TYPE:
                    array_push(
                        $this->_music,
                        array(
                            'id' => $folders->key,
                            'title' => $folders->title,
                            'url' => $url,
                            'responseType' => $this->_responseType
                        )
                    );
                    break;
                case \Framework\DeviceModel\Mediaserver\Plex\LIBRARY_LISTING_PHOTO_TYPE:
                    array_push($this->_photos,
                        array(
                            'id' => $folders->key,
                            'title' => $folders->title,
                            'url' => $url,
                            'responseType' => $this->_responseType
                        )
                    );
                    break;
                case \Framework\DeviceModel\Mediaserver\Plex\LIBRARY_LISTING_TVSHOW_TYPE:
                    array_push($this->_tvshows,
                        array(
                            'id' => $folders->key,
                            'title' => $folders->title,
                            'url' => $url,
                            'responseType' => $this->_responseType
                        )
                    );
                    break;
            }
        }
    }

    /**
     * Gets the url for the media server.
     * @return string $this->_url Returns the url of the media server.
     */
    public function getUrl()
    {
        return (string)$this->_url;
    }

    /**
     * Gets the media object for the media server.
     * @param string $type Movies|Photos|TVShows|Music
     * @return mixed $this->_url Returns the url of the media server.
     */
    public function getMedia($type)
    {
        $return = null;

        switch($type)
        {
            case 'movies':
                /** @var \Framework\DeviceModel\Mediaserver\Plex\Listing\Movies $return */
                $return = new \Framework\DeviceModel\Mediaserver\Plex\Listing\Movies($this->_movies);
                break;
            case 'photos':
                /** @var \Framework\DeviceModel\Mediaserver\Plex\Listing\Photos $return */
                $return = new \Framework\DeviceModel\Mediaserver\Plex\Listing\Photos($this->_photos);
                break;
            case 'tvshows':
                /** @var \Framework\DeviceModel\Mediaserver\Plex\Listing\TVShows $return */
                $return = new \Framework\DeviceModel\Mediaserver\Plex\Listing\TVShows($this->_tvshows);
                break;
            case 'music':
                /** @var \Framework\DeviceModel\Mediaserver\Plex\Listing\Music $return */
                $return = new \Framework\DeviceModel\Mediaserver\Plex\Listing\Music($this->_music);
                break;
        }

        return (object)$return;
    }
}

?>