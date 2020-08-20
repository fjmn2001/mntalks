<?php


declare(strict_types=1);


namespace MNTalks;


final class Temperature
{
    private $measure;

    public function __construct(int $measure)
    {
        $this->ensureMeasureIsPositive($measure);

        $this->measure = $measure;
    }

    public function measure(): int
    {
        return $this->measure;
    }

    private function ensureMeasureIsPositive(int $measure): void
    {
        if ($measure < 0) {
            throw new TemperatureNegativeException("Measure should be positive");
        }
    }

}