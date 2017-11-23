<?php declare(strict_types=1);

namespace Grochowski\StepZone;

final class Config
{
    /**
     * @var array
     */
    private $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function get($key): string
    {
        return $this->values[$key];
    }
}