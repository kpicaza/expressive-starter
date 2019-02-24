<?php

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;

$config = require __DIR__ . '/config.php';
$cliConfig['dependencies'] = $config['console']['dependencies'];
$cliConfig['environment'] = $config['console']['environment'];
$cacheConfig = [
    'config_cache_path' => 'var/cache/cli-config-cache.php',
];

$aggregator = new ConfigAggregator([
    new ArrayProvider($config),
    new ArrayProvider($cliConfig),
    new ArrayProvider($cacheConfig),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
