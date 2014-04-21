<?php

require_once('Includes/LoadFramework.php');

/**
* example of documenting a variable's type.
* @object \Framework\Plex\Plex $plex plex media server.
*/
// $plex = new \Framework\Plex\Plex("http", "20.10.2.4", 32400);

// $plex->setMediaListings('/library/sections/');

// echo $plex->getMediaListings()->getFullList();

$plex = \Framework\Devices\Factory::build("plex.json", 'JSON');


$plexServer['host'] = '20.10.2.4';
$plexServer['port'] = 32400;
$plexServer['url'] = 'http://'.$plexServer['host'].':'.$plexServer['port'];
$plexServer['listings'] = '/library/sections/';

// recently added http://20.10.2.4:32400/library/sections/2/recentlyAdded
// recently aired: http://20.10.2.4:32400/library/sections/2/newest

$category_url = $plexServer['url'].$plexServer['listings'];

$xml_categories = file_get_contents($category_url);
$xml_categories = simplexml_load_string($xml_categories);

echo '<pre>';

$item = "";
foreach($xml_categories->Directory as $result)
{
	$item = $result->attributes();
	
	echo $item['key'].'-'.$item['type'].'<br>';
	
	$xml_category = file_get_contents($category_url.$item['key'].'/all');
	$xml_category = simplexml_load_string($xml_category);
	
	foreach($xml_category as $categoryResult)
	{
		// print_r($categoryResult);
		/* echo '<li>'.
				$categoryResult->attributes()->title.
			'   <img width="80" src="'.$plexServer['url'].$categoryResult->attributes()->thumb.'" alt="">
			</li>';*/
	}
	break;
	
}

exit();



?>
<html>
<head>
	<title>Castle-V</title>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
      <meta name="viewport" content="user-scalable=no, width=device-width" />
    <link rel="apple-touch-icon" href="./apple-touch-icon.png" />
</head>
<body>
<h1>Coming episodes</h1>

<?php
$jester_url = $internal_url[0]["service"].$internal_url[0]['service_port'];

// $url = "http://".$jester_url."/api/".$internal_url[0]['service_api_key']."/1234/?cmd=shows ";
// $url = "http://20.10.2.3:8081/api/edda473a7262cd70a1a7fb35f9f997f6/1234/?cmd=shows"; //all shows
$url = "http://20.10.2.3:8081/api/edda473a7262cd70a1a7fb35f9f997f6/1234/?cmd=future&sort=date" ; // coming episodes &type=today|missed"
$data = file_get_contents($url);

echo '<hr>';

$data = json_decode($data, true);

// print_r($data);
$newdata = array_merge($data['data']['later'], $data['data']['today'], $data['data']['missed']);

function myComparison($a, $b){
    return (key($a) > key($b)) ? -1 : 1;
} 

uasort ( $newdata , 'myComparison' );


print_r($newdata);
echo '<ul>';

foreach ($data['data'] as $show_id => $show) {

echo '<li>'.$show_id.'-'.$show['show_name'].'</li>';
}
echo '</ul>';


?>
</body>
</html>