<?php

use Grochowski\StepZone\GeocodingClient;
use Grochowski\StepZone\SpaceStationClient;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

$spaceStationClient = new SpaceStationClient(new GuzzleClient());
$spaceStationClient->show(25544);
$coordinates = $spaceStationClient->getCoordinates();

$geocodingClient = new GeocodingClient(new GuzzleClient());
$geocodingClient->translateCoordinates($coordinates['latitude'], $coordinates['longitude']);

echo $template->render([
   'geocodingClient' => $geocodingClient
]);


