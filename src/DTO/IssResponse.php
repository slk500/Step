<?php declare(strict_types=1);

namespace Grochowski\StepZone\DTO;

class IssResponse
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    public function __construct(array $array)
    {
        $this->latitude = $array['latitude'];
        $this->longitude = $array['longitude'];
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }


    public function getLongitude(): float
    {
        return $this->longitude;
    }

}