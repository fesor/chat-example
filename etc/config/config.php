<?php

return [
    'framework' => [
        'secret' => getenv('SECRET'),
        'assets' => false,
        'templating' => false,
        'profiler' => ['only_exceptions' => false]
    ]
];
