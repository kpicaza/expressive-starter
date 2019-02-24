<?php

declare(strict_types=1);

use App\Container\ExpressiveAuraConfig;
use Aura\Di\ContainerBuilder;

$config  = require __DIR__ . '/config.php';

$builder = new ContainerBuilder();
return $builder->newConfiguredInstance([
    new ExpressiveAuraConfig($config),
], $builder::AUTO_RESOLVE);
