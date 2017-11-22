<?php

namespace Grochowski\StepZone;

use GuzzleHttp\ClientInterface;

interface BaseClientInterface
{
    public function __construct(ClientInterface $client);

    public function get($params): void;

    public function getResponse(): array;
}