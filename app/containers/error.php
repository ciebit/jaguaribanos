<?php

use App\Controllers\Controller;
use App\Controllers\PageError;
use App\ErrorHandler;
use App\Exceptions\ResourceNotFound;
use Psr\Container\ContainerInterface as Container;
use Slim\Exception\HttpNotFoundException;

return [
    'errorHandler' => function (Container $container): callable 
    {
        $errorHandler = new ErrorHandler($container, 'errorInternal');

        $errorHandler
            ->add('errorNotFound', HttpNotFoundException::class, true)
            ->add('errorNotFound', ResourceNotFound::class, false);

        return $errorHandler;
    },

    'errorInternal' => function (Container $container): Controller 
    {
        $view = $container->get('viewEngine');
        $view->setView('error.500');
        return new PageError(500, $view);
    },

    'errorNotFound' => function (Container $container): Controller 
    {
        $view = $container->get('viewEngine');
        $view->setView('error.404');
        return new PageError(404, $view);
    },
];
