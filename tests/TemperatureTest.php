<?php


declare(strict_types=1);


namespace MNTalks\Tests;


use MNTalks\ColdThresholdSource;
use MNTalks\Temperature;
use MNTalks\TemperatureTestClass;
use PHPUnit\Framework\TestCase;

final class TemperatureTest extends TestCase implements ColdThresholdSource
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
            TemperatureTestClass::take(10)->isSuperHot()
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfASuperHotTemperatureIsSuperHot()
    {
        $this->assertTrue(
            TemperatureTestClass::take(100)->isSuperHot()
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfASuperColdTemperatureIsSuperCold()
    {
        $this->assertTrue(
            TemperatureTestClass::take(10)->isSuperCold(
                $this
            )
        );
    }

    public function getThreshold(): int
    {
        return 50;
    }

    /**
     * @test
     */
    public function tryToCheckIfASuperColdTemperatureIsSuperColdWithAnonClass()
    {
        $this->assertTrue(
            TemperatureTestClass::take(10)->isSuperCold(
                new class implements ColdThresholdSource {
                    public function getThreshold(): int
                    {
                        return 50;
                    }
                }
            )
        );
    }

    /**
     * @test
     */
    public function tryToCreateAValidTemperatureFromStation()
    {
        $this->assertSame(
            50,
            Temperature::fromStation(
                $this
            )->measure()
        );
    }

    public function sensor()
    {
        return $this;
    }

    public function temperature()
    {
        return $this;
    }

    public function measure()
    {
        return 50;
    }

    /**
     * @test
     */
    public function tryToSumTwoMeasures()
    {
        $temperatureA = Temperature::take(50);
        $temperatureB = Temperature::take(50);

        $temperatureC = $temperatureA->sum($temperatureB);

        $this->assertSame(100, $temperatureC->measure());
        $this->assertNotSame($temperatureC, $temperatureA);
        $this->assertNotSame($temperatureC, $temperatureB);
    }
}