<?php

use Psr\Log\LoggerInterface;
use App\Container\MonologFactory;

return [
    'dependencies' => [
        'factories' => [
            LoggerInterface::class => MonologFactory::class,
//            'queue.logger' => [MonologFactory::class, 'queue.logger']
        ]
    ],

    'monolog' => [
        'handlers' => [
            'default' => [
                'type' => 'stream',
                'options' => [
                    'stream' => \sprintf(
                        '%s/%s-%s.log',
                        \realpath(__DIR__ . '/../../data/log/'),
                        (new DateTime())->format('Y-m-d'),
                        'default'
                    ),
                ],
            ],
//            'queue.logger.handler' => [
//                'type' => 'stream',
//                'options' => [
//                    'stream' => \sprintf(
//                        '%s/%s-%s.log',
//                        \realpath(__DIR__ . '/../../data/log/'),
//                        (new DateTime())->format('Y-m-d'),
//                        'queue'
//                    ),
//                ],
//            ],
        ],
        'channels' => [
//            'queue.logger' => [
//                'name' => 'Queue logger',
//                'handlers' => [
//                    'queue.logger.handler',
//                ],
//            ],
        ],
    ],
];
