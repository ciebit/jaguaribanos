<?php

use Psr\Container\ContainerInterface as Container;

return [
    'settings' => [
        'displayErrorDetails' => true,
    ],

    'settingsAppData' => function (Container $container): array 
    {
        return include __DIR__ . '/../../settings.php';
    },
];