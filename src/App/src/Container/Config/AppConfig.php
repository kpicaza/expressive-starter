<?php

declare(strict_types=1);

namespace App\Container\Config;

final class AppConfig
{
    private $config;

    public function __construct(iterable $config)
    {
        $this->config = $config;
    }

    public function config(): iterable
    {
        return $this->config;
    }
}
