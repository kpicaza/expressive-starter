<?php

use App\Container\AppConfigFactory;
use App\Container\Config\AppConfig;
use App\Container\ContainerFactory;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;

return [
    'console' => [
        'dependencies' => [
            'invokables' => [
                Application::class => Application::class,
            ],
            'factories' => [
                AppConfig::class => AppConfigFactory::class,
                ContainerInterface::class => ContainerFactory::class,
            ],
        ],
        'commands' => [
        ],
        'environment' => [
            'root_dir' => getenv('ROOT_DIR'),
        ]
    ]
];
