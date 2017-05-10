<?php

use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/vendor/autoload.php';

require __DIR__.'/src/AppKernel.php';

$env = getenv('SYMFONY_ENV');
$debug = !in_array($env, ['prod']);

$kernel = new \Chat\AppKernel($env, $debug);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
