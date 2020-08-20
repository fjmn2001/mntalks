<?php


declare(strict_types=1);


namespace MNTalks;


final class Temperature
{
    private $measure;

    public function __construct(int $measure)
    {
        $this->setMeasure($measure);
    }

    private function setMeasure(int $measure): void
    {
        $this->ensureMeasureIsPositive($measure);
        $this->measure = $measure;
    }

    private function ensureMeasureIsPositive(int $measure): void
    {
        if ($measure < 0) {
            throw new TemperatureNegativeException("Measure should be positive");
        }
    }

    public function measure(): int
    {
        return $this->measure;
    }
}