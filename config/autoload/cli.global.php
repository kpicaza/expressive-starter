<?php

use App\Cli\ClearConfigCache;
use App\Cli\ShowConfig;
use App\Cli\ShowContainer;
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
        'commands' => [
            ClearConfigCache::NAME => ClearConfigCache::class,
            ShowConfig::NAME => ShowConfig::class,
            ShowContainer::NAME => ShowContainer::class,
        ],
        'environment' => [
            'root_dir' => getenv('ROOT_DIR'),
        ]
    ]
];
