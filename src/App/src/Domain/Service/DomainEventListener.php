<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Event\DomainEvent;

interface DomainEventListener
{
    public function __invoke(DomainEvent $event): void;
}
