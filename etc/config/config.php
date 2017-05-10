<?php

return [
    'framework' => [
        'secret' => getenv('SECRET'),
        'assets' => false,
        'templating' => false,
        'profiler' => ['only_exceptions' => false],
    ],

    'doctrine' => [
        'dbal' => [
            'default_connection' => 'default',
            'connections' => [
                'default' => [
                    'driver' => 'pdo_pgsql',
                    'host' => getenv('DB_HOST'),
                    'port' => getenv('DB_PORT') ?: '5432',
                    'dbname' => getenv('DB_NAME'),
                    'user' => getenv('DB_USER'),
                    'password' => getenv('DB_PASS'),
                ],
            ],
            'types' => [
                \DoctrineExtensions\Types\CarbonDateTimeType::CARBONDATETIME =>
                    \DoctrineExtensions\Types\CarbonDateTimeType::class,
            ],
        ],
        'orm' => [
            'default_entity_manager' => 'default',
            'auto_generate_proxy_classes' => '%kernel.debug%',
            'entity_managers' => [
                'default' => [
                    'connection' => 'default',
                    'mappings' => [
                        'App' => [
                            'type' => 'annotation',
                            'dir' => realpath(__DIR__ . '/../../src/Model/Conversation'),
                            'prefix' => 'Chat\\Model\\Conversation',
                        ],
                    ],
                ],
            ],
        ],
    ],

    'doctrine_migrations' => [
        'namespace' => 'Chat\\Migrations',
        'dir_name' => __DIR__ . '/../migrations',
    ],
];
