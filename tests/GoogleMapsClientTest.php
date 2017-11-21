<?php

namespace Grochowski\StepZone\Test;

use Grochowski\StepZone\lib\GeocodingClient;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as GuzzleClient;

class GoogleMapsClientTest extends TestCase
{
    /**
     * @var GeocodingClient
     */
    private $client;

    public function setUp()
    {
        $this->client = new GeocodingClient(new GuzzleClient());
        $this->client->translateCoordinates(43.879779401917, 81.49973228524);
    }

    public function testGetAddress()
    {
        $this->client->getAddress();
    }
}
