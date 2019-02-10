<?php
use App\Controllers\Controller;
use App\Controllers\Error;
use App\Middleware\Middleware;
use App\Middleware\Settings as SettingsMiddleware;
use App\Settings\Environment as EnvironmentSettings;
use App\Views\Html as ViewHtml;
use Jenssegers\Blade\Blade;
use Psr\Container\ContainerInterface as Container;

return [
    'blade' => function(Container $container): Blade
    {
        $settings = $container->get('environmentSettings');

        return new Blade(
            realpath(__DIR__.'/../../views'),
            $settings->getViewsCache()
        );
    },

    'environmentSettings' => function(Container $container): EnvironmentSettings
    {
        return new EnvironmentSettings($container->get('settingsAppData')['environment']);
    },

    'notFoundHandler' => function(Container $container): Controller
    {
        $view = $container->get('viewHtml');
        $view->setView('commons.error');
        return new Error(404, $view);
    },

    'settings' => [
        'displayErrorDetails' => true,
    ],

    'settingsAppData' => function(Container $container): array
    {
        return include __DIR__.'/../../../settings.php';
    },

    'settingsMiddleware' => function(Container $container): Middleware
    {
        return new SettingsMiddleware;
    },

    'viewHtml' => function(Container $container): ViewHtml
    {
        return new ViewHtml($container->get('blade'));
    }
];
