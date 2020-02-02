<?php

use App\Middleware\Middleware;
use App\Middleware\Environment as EnvironmentMiddleware;
use App\Settings\Environment as EnvironmentSettings;
use Psr\Container\ContainerInterface as Container;

return [
    'environmentMiddleware' => function (Container $container): Middleware 
    {
        return new EnvironmentMiddleware;
    },

    'environmentSettings' => function (Container $container): EnvironmentSettings 
    {
        return new EnvironmentSettings($container->get('settingsAppData')['environment']);
    },
];
