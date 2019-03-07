<?php

use App\Domain\Command\AddBoardCommand;
use App\Domain\Handler\AddBoard;
use App\Infrastructure\CommandBus\Tactician\DomainEventDistributorMiddleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use League\Tactician\Doctrine\ORM\TransactionMiddleware;
use League\Tactician\Logger\LoggerMiddleware;
use League\Tactician\Plugins\LockingMiddleware;

return [
    'dependencies' => [
        'invokables' => [
            TransactionMiddleware::class => TransactionMiddleware::class,
            DomainEventDistributorMiddleware::class => DomainEventDistributorMiddleware::class,
        ],
        'factories' => [
        ],
        'aliases' => [
            EntityManagerInterface::class => EntityManager::class,
        ],
    ],
    'command-bus' => [
        'middleware' => [
            LockingMiddleware::class => LockingMiddleware::class,
            LoggerMiddleware::class => LoggerMiddleware::class,
            TransactionMiddleware::class => TransactionMiddleware::class,
            DomainEventDistributorMiddleware::class => DomainEventDistributorMiddleware::class,

        ],
        'handler-map' => [
//            App\Command\PingCommand::class => App\Handler\PingHandler::class
        ],
    ],
];
