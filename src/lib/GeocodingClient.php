<?php

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