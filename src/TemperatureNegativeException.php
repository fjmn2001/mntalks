<?php

namespace MNTalks;

class TemperatureNegativeException extends \Exception
{
    public static function fromMeasure(int $measure)
    {
        return new static(
            sprintf("Measure %d should be positive", $measure)
        );
    }
}