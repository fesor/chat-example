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
        ],
    ],

    'doctrine_migrations' => [
        'namespace' => 'Chat\\Migrations',
        'dir_name' => __DIR__ . '/../migrations',
    ],
];
