<?php


declare(strict_types=1);


namespace MNTalks;


final class TemperatureTestClass extends Temperature
{
    protected function getThreshold(): int
    {
        return 50;
    }
}