<?php
use App\Controllers\Controller;
use App\Controllers\ContentStatic;
use Psr\Container\ContainerInterface as Container;

return [
    'personality' => function(Container $container): Controller
    {
        $view = $container->get('viewEngine');
        $view->setView('personalities.personality');

        return new ContentStatic($view);
    },
    
    'personalities' => function(Container $container): Controller
    {
        $view = $container->get('viewEngine');
        $view->setView('personalities.list');

        return new ContentStatic($view);
    },
];
