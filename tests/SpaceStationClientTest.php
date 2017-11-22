<?php

namespace Grochowski\StepZone\Test;

use Grochowski\StepZone\SpaceStationClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as GuzzleClient;

class SpaceStationClientTest extends TestCase
{
    /**
     * @var SpaceStationClient
     */
    private $client;

    public function setUp()
    {
        $mock = new MockHandler([
            new Response(200,
                ['Content-Type' =>  'application/json'],
                fopen(__DIR__ . '/mock/SpaceStationClient/body/200.txt', 'rb+'))
        ]);

        $handler = HandlerStack::create($mock);

        $this->client = new SpaceStationClient(new GuzzleClient(['handler' => $handler]));

        $this->client->show(2544);
    }

    public function testGetStatusCode()
    {
        $this->assertSame(200, $this->client->getStatusCode());
    }

    public function testGetCoordinates()
    {
        $result = $this->client->getCoordinates();

        $this->assertArrayHasKey('latitude', $result);
        $this->assertArrayHasKey('longitude', $result);
    }
}
