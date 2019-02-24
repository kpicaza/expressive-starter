# Expressive Starter 

[Zend Expressive Docs](https://docs.zendframework.com/zend-expressive/)

## Router:

* [Aura Router](https://github.com/auraphp/Aura.Router)

### Usage:

````php
<?php
// config/routes.php

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 * 
 * Or with routed pipeline
 * 
 * $app->post('/login', [
 *   App\Handler\ValidateLoginMiddleware::class,
 *   ... 
 *   App\Handler\LoginHandler::class,
 * ], 'login');
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
};
````

## Dependency injection: 

* [Aura DI](https://github.com/auraphp/Aura.Di)

### Usage:

````php
<?php
// config/autoload/dependencies.global.php

use ...

return [
        // Provides application-wide services.
        // We recommend using fully-qualified class names whenever possible as
        // service names.
        'dependencies' => [
            // Use 'aliases' to alias a service name to another service. The
            // key is the alias name, the value is the service to which it points.
            'aliases' => [
                // Fully\Qualified\ClassOrInterfaceName::class => Fully\Qualified\ClassName::class,
                'message.processor' => MessageProcessor::class,
            ],
            // Use 'invokables' for constructor-less services, or services that do
            // not require arguments to the constructor or services that constructor
            // requires arguments typed with known classes by container. Map a
            // service name to the class name.
            'invokables' => [
                // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
                HomePageAction::class => HomePageAction::class,
            ],
            // Use 'factories' for services provided by callbacks/factory classes.
            'factories'  => [
                // Fully\Qualified\ClassName::class => Fully\Qualified\FactoryName::class,
                LoggerInterface::class => MonologFactory::class,
                'queue.logger' => [MonologFactory::class, 'queue.logger']                
            ],
            // Use 'conditional' to use different implementation services in
            // different contexts.
            'conditionals' => [
                MessageProcessor::class => [
                    'class' => MessageProcessor::class,
                    'arguments' => [
                        'logger' => 'queue.logger',
                    ]
                ],                
            ],
        ],
];

````

## Cli:

* [Symfony Cli](https://symfony.com/doc/current/components/console.html)

### Usage:

````php
<?php
// config/autoload/cli.global.php

return [
    'console' => [
        // Declare cli specific dependencies.
        'dependencies' => [
            'invokables' => [
                Application::class => Application::class,
                ClearConfigCache::class => ClearConfigCache::class,
                ShowConfig::class => ShowConfig::class,
                ShowContainer::class => ShowContainer::class,
            ],
            'factories' => [
                AppConfig::class => AppConfigFactory::class,
                ContainerInterface::class => ContainerFactory::class,
            ],
            'conditionals' => [],
        ],
        // Subscribe commands to console application.
        'commands' => [
            ClearConfigCache::NAME => ClearConfigCache::class,
            ShowConfig::NAME => ShowConfig::class,
            ShowContainer::NAME => ShowContainer::class,
        ],
    ]
];
````
