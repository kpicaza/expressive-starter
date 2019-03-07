<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Event\DomainEvent;

interface DomainEventEmitterInterface
{
    public function addListener(string $eventName, callable $listener): void;
    public function recordThat(DomainEvent $event): void;
    public function popEvents(): void;
    public function events(): array;
}
