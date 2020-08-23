<?php


namespace MNTalks;


interface ColdThresholdSource
{
    public function getThreshold(): int;
}