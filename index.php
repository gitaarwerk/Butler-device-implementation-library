<?php

echo 'hier hoor je niet te komen...';

/**
* example of documenting a variable's type.
* @object \Framework\Plex\Plex $plex plex media server.
*/

$plex = \Framework\DeviceModel\Factory::build("DeviceTemplates/plex.json", 'JSON');

$movies = $plex->getMedia('movies')->setFilter('movies')->getMovieList(\Framework\DeviceModel\Mediaserver\Plex\LIBRARY_LISTING_RECENTLY_ADDED);

var_dump($movies);