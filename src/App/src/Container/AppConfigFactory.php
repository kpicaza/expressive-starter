<?php

declare(strict_types=1);

namespace App\Container;

use App\Container\Config\AppConfig;
use Psr\Container\ContainerInterface;

final class AppConfigFactory
{
    public function __invoke(ContainerInterface $container): AppConfig
    {
        $config = $container->get('config');

        return new AppConfig($config);
    }
}
