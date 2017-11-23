<?php declare(strict_types=1);

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

    /**
     * @var string
     */
    private $url;

    public function __construct(ClientInterface $client, Config $config)
    {
        $this->client = $client;
        $this->url = $config->get('url_space_station');
    }


    public function getCoordinates(): array
    {
        $bodyContent = $this->getBodyContent();

        return [
            'latitude' => $bodyContent['latitude'],
            'longitude' => $bodyContent['longitude']
            ];
    }

    public function sendRequestWithId(int $id): void
    {
        $this->sendRequest(['id' => $id]);
    }


    public function sendRequest(array $params = null): void
    {
        $this->psrResponse = $this->client->request('GET', $this->url, [
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