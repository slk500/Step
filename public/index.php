<?php declare(strict_types=1);

require_once '../vendor/autoload.php';

use Grochowski\StepZone\DTO\IssResponse;
use GuzzleHttp\Client as GuzzleClient;

$guzzle = new GuzzleClient();

$response = $guzzle->get('https://api.wheretheiss.at/v1/satellites/25544');

$responseBodyJson = $response->getBody()->getContents();
$responseBodyArray = json_decode($responseBodyJson, true);

$issResponse = new IssResponse($responseBodyArray);

$response = $guzzle->get('https://maps.googleapis.com/maps/api/geocode/json', [
    'query' => [
        'latlng' => $issResponse->getLatitude() .','. $issResponse->getLongitude()
    ]]);

$responseBodyJson = $response->getBody()->getContents();
$responseBodyArray = json_decode($responseBodyJson, true);

var_dump($responseBodyArray);

var_dump($responseBodyArray['results']['0']['formatted_address']);

