<?php
/**
 * Created by PhpStorm.
 * User: slk
 * Date: 11/21/17
 * Time: 8:39 AM
 */

namespace Grochowski\StepZone\Test;

use Grochowski\StepZone\lib\SpaceStationClient;
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
        $this->client = new SpaceStationClient(new GuzzleClient());
        $this->client->show(25544);
    }

    public function testGetCoordinates()
    {
        $result = $this->client->getCoordinates();

        $this->assertArrayHasKey('latitude', $result);
        $this->assertArrayHasKey('longitude', $result);
    }
}
