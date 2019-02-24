<?php

declare(strict_types=1);

namespace App\Container;

use Psr\Container\ContainerInterface;
use RuntimeException;

class ContainerFactory
{
    public function __invoke(ContainerInterface $container): ContainerInterface
    {
        if (\PHP_SAPI !== 'cli') {
            throw new RuntimeException('You can only inject container directly inner cli commands.');
        }

        return clone $container;
    }
}
