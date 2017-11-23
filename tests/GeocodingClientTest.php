<?php

namespace Grochowski\StepZone\Test;

use Grochowski\StepZone\Config;
use Grochowski\StepZone\GeocodingClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as GuzzleClient;

class GeocodingClientTest extends TestCase
{
    /**
     * @var GeocodingClient
     */
    private $client;

    public function setUp()
    {
        $mock = new MockHandler([
            new Response(200,
                ['Content-Type' =>  'application/json'],
                fopen(__DIR__ .'/mock/GeocodingClient/body/200.txt', 'rb+'))
        ]);

        $handler = HandlerStack::create($mock);

        $config = new Config(require __DIR__.'/../config/config.php');

        $this->client = new GeocodingClient(new GuzzleClient(['handler' => $handler]), $config);

        $this->client->sendRequestWithCoordinates([
            'latitude' => 43.879779401917,
            'longitude' => 81.49973228524
        ]);
    }

    public function testGetStatusCode()
    {
        $this->assertSame(200, $this->client->getStatusCode());
    }

    public function testGetAddress()
    {
        $this->assertSame('Unnamed Road, Yining Xian, Yili Hasakezizhizhou, Xinjiang Weiwuerzizhiqu, China',
            $this->client->getTranslatedCoordinates());
    }

    public function testGetStatus()
    {
        $this->assertSame('OK', $this->client->getStatus());
    }

    public function testTwoTimesCallOnBody()
    {
        $this->assertNotEmpty($this->client->getBodyContent());
        $this->assertNotEmpty($this->client->getBodyContent());
    }
}
