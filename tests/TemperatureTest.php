<?php


declare(strict_types=1);


namespace MNTalks\Tests;


use MNTalks\Temperature;
use MNTalks\TemperatureTestClass;
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

    /**
     * @test
     */
    public function tryToCheckIfAColdTemperatureIsSuperHot()
    {
        $this->assertFalse(
            TemperatureTestClass::take(10)->isSuperHost()
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfASuperHotTemperatureIsSuperHot()
    {
        $this->assertTrue(
            TemperatureTestClass::take(100)->isSuperHost()
        );
    }
}