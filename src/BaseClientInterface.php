<?php

namespace Grochowski\StepZone;

use GuzzleHttp\ClientInterface;

interface BaseClientInterface
{
    public function __construct(ClientInterface $client);

    public function get(array $params): void;

    public function getBodyContent(): array;

    public function getStatusCode(): int;
}