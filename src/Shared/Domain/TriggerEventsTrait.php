<?php

declare(strict_types=1);

namespace MNTalks\Shared\Domain;

trait TriggerEventsTrait
{
    private $events = [];

    protected function trigger($event)
    {
        $this->events[] = $event;
    }

    public function getEvents(): array
    {
        return $this->events;
    }
}