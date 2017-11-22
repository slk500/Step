<?php

namespace Grochowski\StepZone;

use GuzzleHttp\ClientInterface;

final class GeocodingClient implements BaseClientInterface
{

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

    public function get(array $params = null): void
    {
        $this->psrResponse = $this->client->request('GET', getenv('URL_GEOCODE'), [
                'query' => $params
            ]
        );
    }

    public function getStatusCode(): int
    {
        return $this->psrResponse->getStatusCode();
    }

    public function getBodyContent(): array
    {
        return json_decode((string) $this->psrResponse->getBody(), true);
    }

    public function translateCoordinates(float $latitude, float $longitude): void
    {
        $this->get(['latlng' => "$latitude, $longitude"]);
    }

    public function getAddress(): string
    {
        return $this->getBodyContent()['results']['0']['formatted_address'];
    }

    public function getStatus(): string
    {
        return $this->getBodyContent()['status'];
    }
}