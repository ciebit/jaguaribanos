<?php

use App\Views\Html as ViewHtml;
use Jenssegers\Blade\Blade;
use Psr\Container\ContainerInterface as Container;

return [
    'viewEngine' => function (Container $container): ViewHtml 
    {
        return new ViewHtml($container->get('viewTemplateEngine'));
    },

    'viewTemplateEngine' => function (Container $container): Blade 
    {
        $settings = $container->get('environmentSettings');

        return new Blade(
            realpath(__DIR__ . '/../views'),
            $settings->getViewsCache()
        );
    },
];
