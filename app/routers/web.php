<?php

declare(strict_types=1);

use Slim\App;
use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;

$app = (function (): App {
    $container = new ContainerBuilder;
    $container->addDefinitions(include __DIR__ . '/../containers/main.php');
    return Bridge::create($container->build());
})();

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true)
    ->setDefaultErrorHandler('errorHandler');

// $app->add('environmentMiddleware');

$app->get('/', ['cover', 'run']);

$app->get('/personalidades/', ['personalities','run']);

$app->get('/personalidades/{personalitySlug}/', ['personality','run']);

$app->run();
