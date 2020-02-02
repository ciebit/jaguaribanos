<?php
use App\Controllers\Controller;
use App\Controllers\ContentStatic;
use Psr\Container\ContainerInterface as Container;

return [
    'cover' => function(Container $container): Controller
    {
        $view = $container->get('viewEngine');
        $view->setView('cover.index');

        return new ContentStatic($view);
    },
];
