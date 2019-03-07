<?php

declare(strict_types=1);

use App\Application\Http\AddBoardHandler;
use App\Application\Http\Middleware\ValidateAddBoardParams;
use App\Container\DoctrineRepositoryFactory;
use App\Container\DomainEventEmitterFactory;
use App\Domain\BoardRepository;
use App\Domain\Model\Aggregate\Board;
use App\Domain\Service\DomainEventEmitterInterface;
use ContainerInteropDoctrine\EntityManagerFactory;
use Doctrine\ORM\EntityManager;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
            // Fully\Qualified\ClassOrInterfaceName::class => Fully\Qualified\ClassName::class,
        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
            // Fully\Qualified\ClassName::class => Fully\Qualified\FactoryName::class,
            EntityManager::class => EntityManagerFactory::class,
            DomainEventEmitterInterface::class => DomainEventEmitterFactory::class,
        ],
        'conditionals' => [

        ],
    ],
];
