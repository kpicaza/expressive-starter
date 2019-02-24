<?php

declare(strict_types=1);

use App\Container\ExpressiveAuraConfig;
use Aura\Di\ContainerBuilder;
use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

$cliConfig = (new ConfigAggregator([
    new PhpFileProvider(realpath(__DIR__) . '/autoload/cli.global.php')
]))->getMergedConfig();
$envProvider = (new ConfigAggregator([
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{env.global,env.local}.php'),
    new ArrayProvider($cliConfig['console'])
]))->getMergedConfig();

$config  = require __DIR__ . '/cli-config.php';

$builder = new ContainerBuilder();
return $builder->newConfiguredInstance([
    new ExpressiveAuraConfig($config),
], $builder::AUTO_RESOLVE);
