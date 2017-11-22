<?php

namespace Grochowski\StepZone;

use GuzzleHttp\ClientInterface;


final class SpaceStationClient implements BaseClientInterface
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

    public function getCoordinates(): array
    {
        $bodyContent = $this->getBodyContent();

        return [
            'latitude' => $bodyContent['latitude'],
            'longitude' => $bodyContent['longitude']
            ];
    }

    public function show(int $id)
    {
        $this->get(['id' => $id]);
    }

    public function get(array $params = null): void
    {
        $this->psrResponse = $this->client->request('GET', getenv('URL_WHERETHEISS'), [
                'query' => $params
            ]
        );
    }

    public function getBodyContent(): array
    {
        return json_decode((string) $this->psrResponse->getBody()->getContents(), true);
    }

    public function getStatusCode(): int
    {
        return $this->psrResponse->getStatusCode();
    }

}