<?php

namespace Grochowski\StepZone\lib;

class SpaceStationClient extends BaseClient
{
    protected const BASE_URL = 'https://api.wheretheiss.at/v1/satellites/';

    public function getCoordinates(): array
    {
        return $this->getResponse();
    }

    public function show($id)
    {
        $this->get(['id' => $id]);
    }
}