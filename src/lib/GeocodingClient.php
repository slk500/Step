<?php
/**
 * Created by PhpStorm.
 * User: slk
 * Date: 11/21/17
 * Time: 8:20 AM
 */

namespace Grochowski\StepZone\lib;

class GeocodingClient extends BaseClient
{
    protected const BASE_URL = 'https://maps.googleapis.com/maps/api/geocode/json';

    public function translateCoordinates(float $latitude, float $longitude): void
    {
        $this->get(['latlng' => "$latitude, $longitude"]);
    }

    public function getAddress(): string
    {
        return $this->getResponse()['results']['0']['formatted_address'];
    }
}