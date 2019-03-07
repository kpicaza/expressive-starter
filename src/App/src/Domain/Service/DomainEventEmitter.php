<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Event\DomainEvent;
use Evenement\EventEmitter;
use Evenement\EventEmitterInterface;

class DomainEventEmitter implements DomainEventEmitterInterface
{
    /** @var static */
    private static $instance;
    /** @var DomainEvent[] */
    private $events;
    /** @var EventEmitterInterface */
    private $emitter;

    private function __construct()
    {
        $this->emitter = new EventEmitter;
        $this->events = [];

        static::$instance = $this;
    }

    public static function instance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function addListener(string $eventName, callable $listener): void
    {
        $this->emitter->on($eventName, $listener);
    }

    public function recordThat(DomainEvent $event): void
    {
        $this->events[] = $event;
    }

    public function popEvents(): void
    {
        foreach ($this->events as $event) {
            $this->emitter->emit($event->name(), [$event]);
        }

        $this->events = [];
    }

    public function events(): array
    {
        return $this->events;
    }
}
