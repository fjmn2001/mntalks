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
        $measure = -1;
        $this->expectExceptionMessage("Measure {$measure} should be positive");
        Temperature::take($measure);
    }

    /**
     * @test
     */
    public function tryToCreateAValidTemperature()
    {
        $measure = 18;

        $this->assertSame(
            $measure,
            Temperature::take($measure)->measure()
        );
    }

    /**
     * @test
     */
    public function tryToCreateAValidTemperatureWithNameConstructor()
    {
        $measure = 18;

        $this->assertSame(
            $measure,
            Temperature::take($measure)->measure()
        );
    }
}