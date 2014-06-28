<?php

namespace Framework\DeviceModel\Mediaserver\Plex\Listing;

/* @package Plex */
class Movies
    implements  \Framework\Interfaces\MediaListings
{

    private $_movieUrls;
    private $_movies;
    private $_folderFilter = array();

    public function __construct($movieUrls)
    {
        $this->_movieUrls = $movieUrls;
    }

    /* @return array $this->_movies */
    public function getMovieList($listType = \Framework\DeviceModel\Mediaserver\Plex\LIBRARY_LISTING_ALL)
    {
        $return_movies = array();

        foreach ($this->_movieUrls as $movies)
        {
            $filter = trim(strtolower($movies["title"]));

            // if filter is set, and is not the selected one, continue;
            if (count($this->_folderFilter) > 0 && in_array($filter, $this->_folderFilter) === false)
            {
                continue;
            }

            $url = $movies["url"] . $listType;
            $dataloader = new \Framework\Build\Dataloader($url, $movies["responseType"]);
            $data = $dataloader->getData();

            array_push($return_movies, $data["_children"]);
        }

        $this->_movies = $return_movies;

        return (array)$this->_movies;
    }

    public function getMovies()
    {
        return (array)$this->_movies;
    }

    /* @return $this */
    public function setFilter($filter)
    {
        $filter = trim(strtolower($filter));

        $filters1 = explode(',', $filter);
        $filters2 = explode(', ', $filter);
        $filters = array_merge($filters1, $filters2);

        $this->_folderFilter = $filters;

        return $this;
    }

    /* @return array $this->_folderFilter */
    public function geCurrentFilter()
    {
        return (array)$this->_folderFilter;
    }

    /* @return array $return_titles */
    public function getFilters()
    {
        $return_titles = array();

        foreach ($this->_movieUrls as $movieUrls)
        {
            $title = trim(strtolower($movieUrls['title']));
            array_push($return_titles, $title);
        }

        return (array)$return_titles;
    }
}