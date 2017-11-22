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

    public function __construct(ClientInterface $baseClient)
    {
        $this->client = $baseClient;
    }

    public function getCoordinates(): array
    {
        return $this->getResponse();
    }

    public function show($id)
    {
        $this->get(['id' => $id]);
    }

    public function get($params): void
    {
        $this->psrResponse = $this->client->request('GET', getenv('URL_WHERETHEISS'), [
                'query' => $params
            ]
        );
    }

    public function getResponse(): array
    {
        return json_decode($this->psrResponse->getBody()->getContents(), true);
    }

    public function getStatusCode(): int
    {
        return $this->psrResponse->getStatusCode();
    }

}