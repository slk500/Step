<?php
/**
 * Created by PhpStorm.
 * User: slk
 * Date: 11/21/17
 * Time: 8:33 AM
 */

namespace Grochowski\StepZone\lib;

use GuzzleHttp\ClientInterface;

class BaseClient
{
    protected const BASE_URL = '';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $psrResponse;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function get($params): void
    {
        $this->psrResponse = $this->client->request('GET',static::BASE_URL, [
                'query' => $params
            ]
        );
    }

    protected function getResponse(): array
    {
        return json_decode($this->psrResponse->getBody()->getContents(), true);
    }
}