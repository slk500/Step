<?php declare(strict_types=1);

use Grochowski\StepZone\Config;
use Grochowski\StepZone\GeocodingClient;
use Grochowski\StepZone\SpaceStationClient;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__ . '/../bootstrap.php';

$config = new Config(require __DIR__ . '/../config/config.php');

$issSatelliteId = 25544;

$spaceStationClient = new SpaceStationClient(new GuzzleClient(), $config);
$spaceStationClient->sendRequestWithId($issSatelliteId);
$coordinates = $spaceStationClient->getCoordinates();

$geocodingClient = new GeocodingClient(new GuzzleClient(), $config);
$geocodingClient->sendRequestWithCoordinates($coordinates);


$translatedCoordinates = $geocodingClient->getTranslatedCoordinates();
$status = $geocodingClient->getStatus();


echo $template->render([
    'address' => $translatedCoordinates,
    'status' => $status
]);


