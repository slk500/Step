<?php declare(strict_types=1);

namespace Grochowski\StepZone;

use Grochowski\StepZone\Config;
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

    /**
     * @var string
     */
    private $url;

    public function __construct(ClientInterface $client, Config $config)
    {
        $this->client = $client;
        $this->url = $config->get('url_geocode');
    }


    public function getTranslatedCoordinates(): ?string
    {
        $body = $this->getBodyContent();

        if(!array_key_exists('result', $body))
        {
           return null;
        }

        return ['results']['0']['formatted_address'];
    }

    public function sendRequestWithCoordinates(array $coordinates): void
    {
        $this->sendRequest(['latlng' => "{$coordinates['latitude']}, {$coordinates['longitude']}"]);
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
        return json_decode((string) $this->psrResponse->getBody(), true);
    }

    public function getStatus(): string
    {
        return $this->getBodyContent()['status'];
    }

    public function getStatusCode(): int
    {
        return $this->psrResponse->getStatusCode();
    }
}