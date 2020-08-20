<?php


declare(strict_types=1);


namespace MNTalks\Tests;


use MNTalks\Temperature;
use PHPUnit\Framework\TestCase;

final class TemperatureTest extends TestCase
{
    /**
     * @test
     */
    public function tryToCreateANonValidTemperature()
    {
        $this->expectExceptionMessage("Measure should be positive");
        new Temperature(-1);
    }

    /**
     * @test
     */
    public function tryToCreateAValidTemperature()
    {
        $measure = 18;

        $this->assertSame(
            $measure,
            (new Temperature($measure))->measure()
        );
    }
}