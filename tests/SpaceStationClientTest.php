<?php

namespace Grochowski\StepZone\Test;

use Grochowski\StepZone\SpaceStationClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\Dotenv\Dotenv;

class SpaceStationClientTest extends TestCase
{
    /**
     * @var SpaceStationClient
     */
    private $client;

    /**
     * @var GuzzleClient
     */
    private $guzzle;

    public function setUp()
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ .'/../.env');

        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar']),
        ]);

        $handler = HandlerStack::create($mock);

        $this->client = new SpaceStationClient(new GuzzleClient(['handler' => $handler]));

        $this->guzzle = new GuzzleClient(['handler' => $handler]);

    }

    public function testOne()
    {

        $this->assertSame(200, $this->guzzle->request('GET', '/')->getStatusCode());

        $this->assertSame(200, $this->client->getStatusCode());

    }

}
