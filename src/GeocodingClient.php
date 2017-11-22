<?php

namespace Grochowski\StepZone;

use GuzzleHttp\ClientInterface;

final class GeocodingClient implements BaseClientInterface
{
    private const BASE_URL = 'https://maps.googleapis.com/maps/api/geocode/json';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    private $psrResponse;

    public function __construct(ClientInterface $client)
    {

        $this->client = $client;
    }

    public function get($params): void
    {
        $this->psrResponse = $this->client->request('GET', static::BASE_URL, [
                'query' => $params
            ]
        );
    }

    public function getResponse(): array
    {
        return json_decode($this->psrResponse->getBody()->getContents(), true);
    }

    public function translateCoordinates(float $latitude, float $longitude): void
    {
        $this->get(['latlng' => "$latitude, $longitude"]);
    }

    public function getAddress(): string
    {
        return $this->getResponse()['results']['0']['formatted_address'];
    }
}