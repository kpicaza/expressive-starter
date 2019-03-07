<?php

use Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;

return [
    'doctrine' => [
        'driver' => [
            'orm_default' => [
                'class' => MappingDriverChain::class,
                'drivers' => [
//                    'App\Domain\Model\Aggregate' => 'board',
                ],
            ],
//            'board' => [
//                'class' => SimplifiedYamlDriver::class,
//                'cache' => 'array',
//                'paths' => [
//                    dirname(__DIR__).'/doctrine' => 'App\Domain\Model\Aggregate',
//                ],
//            ],
        ],
        'types' => [
//            'board_id' => BoardIdType::class,
//            'user_id' => UserIdType::class,
//            'name' => NameType::class,
//            'description' => DescriptionType::class,
        ],
    ],
];
