<?php

declare(strict_types=1);

namespace App\Container;

use App\Domain\Event\UserWasCreated;
use App\Domain\Service\DomainEventEmitter;
use App\Domain\Service\DomainEventEmitterInterface;
use App\Domain\Service\MessageProducer;
use Psr\Container\ContainerInterface;

class DomainEventEmitterFactory
{
    public function __invoke(ContainerInterface $container): DomainEventEmitterInterface
    {
        $emitter = DomainEventEmitter::instance();
        $callback = function ($event) use ($container) {
            $listener = $container->get(MessageProducer::class);
            return $listener($event);
        };

        $emitter->addListener('user.was.created', $callback);
        $emitter->addListener('user.signed.in', $callback);
        $emitter->addListener('unauthorized.sign.in.attempted', $callback);

        return $emitter;
    }
}
