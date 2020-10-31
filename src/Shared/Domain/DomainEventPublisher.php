<?php

declare(strict_types=1);

namespace MNTalks\Shared\Domain;

final class DomainEventPublisher
{
    private $subscribers = [];
    private static $instance = null;
    private $id = 0;

    public static function instance(): self
    {
        if (null === static::$instance) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    public function __construct()
    {
        $this->subscribers = [];
    }

    public function __clone()
    {
        throw new \BadFunctionCallException("Clone is not supported");
    }

    public function subscribe($aDomainEventSubscriber): int
    {
        $id = $this->id;
        $this->subscribers[$id] = $aDomainEventSubscriber;
        $this->id++;

        return $id;
    }

    public function ofId(int $id)
    {
        return isset($this->subscribers[$id]) ? $this->subscribers[$id] : null;
    }

    public function unsubscribe(int $id): void
    {
        unset($this->subscribers[$id]);
    }

    public function publish(DomainEvent $aDomainEvent)
    {
        foreach ($this->subscribers as $aSubscriber) {
            if ($aSubscriber->isSubscribedTo($aDomainEvent)) {
                $aSubscriber->handle($aDomainEvent);
            }
        }
    }
}