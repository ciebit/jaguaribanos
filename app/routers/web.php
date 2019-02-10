<?php
use Slim\App;
use Slim\Container;

$app = (function(){
    $config = include __DIR__.'/containers/main.php';
    $container = new Container($config);
    return new App($container);
})();

$app->add('settingsMiddleware:run');

$app->get('/', 'cover:run');

$app->get('/personalidades/', 'personalities:run');

$app->get('/personalidades/{personalitySlug}/', 'personality:run');

$app->run();
