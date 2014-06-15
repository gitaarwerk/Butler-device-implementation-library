<?php

echo 'hier hoor je niet te komen...';
exit;

/**
* example of documenting a variable's type.
* @object \Framework\Plex\Plex $plex plex media server.
*/

$plex = \Framework\Device\Factory::build("DeviceTemplates/plex.json", 'JSON');

$movies = $plex->getMedia('movies')->setFilter('movies')->getMovieList(\Framework\Device\Mediaserver\Plex\LIBRARY_LISTING_RECENTLY_ADDED);

var_dump($movies);