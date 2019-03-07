<?php

declare(strict_types=1);

namespace App\Infrastructure\CommandBus\Tactician;

use App\Domain\Service\DomainEventEmitterInterface;
use League\Tactician\Middleware;

class DomainEventDistributorMiddleware implements Middleware
{
    private $domainEventEmitter;

    public function __construct(DomainEventEmitterInterface $domainEventEmitter)
    {
        $this->domainEventEmitter = $domainEventEmitter;
    }

    public function execute($command, callable $next)
    {
        $returnValue = $next($command);
        $this->domainEventEmitter->popEvents();

        return $returnValue;
    }
}
