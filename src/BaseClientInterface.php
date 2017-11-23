<?php

namespace Grochowski\StepZone;

use Grochowski\StepZone\Config;
use GuzzleHttp\ClientInterface;

interface BaseClientInterface
{
    public function __construct(ClientInterface $client, Config $config);

    public function sendRequest(array $params): void;

    public function getBodyContent(): array;

    public function getStatusCode(): int;
}