<?php


declare(strict_types=1);


namespace MNTalks;


class Temperature
{
    private $measure;

    private function __construct(int $measure)
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
            throw TemperatureNegativeException::fromMeasure($measure);
        }
    }

    public static function take(int $measure): self
    {
        return new static($measure);
    }

    public function measure(): int
    {
        return $this->measure;
    }

    public function isSuperHost(): bool
    {
        $threshold = $this->getThreshold();

        return $this->measure() > $threshold;
    }

    protected function getThreshold(): int
    {
        $threshold = 50;
        return $threshold;//from SQL adding smell code
    }
}