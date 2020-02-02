<?php

declare(strict_types=1);

namespace App;

use Psr\Container\ContainerInterface as Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Factory\ResponseFactory;
use Throwable;

use function error_log;

class ErrorHandler
{
    private Container $container;
    private array $errors;

    public function __construct(Container $container, string $errorDefault)
    {
        $this->container = $container;
        $this->errors = [];
        $this->add(
            $errorDefault,
            '',
            true
        );
    }

    public function add(
        string $containerKey, 
        string $className, 
        bool $registerLog = true
    ): self {
        $this->errors[] = [
            'className' => $className,
            'containerKey' => $containerKey,
            'registerLog' => $registerLog,
        ];

        return $this;
    }

    public function __invoke(
        Request $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails
    ): Response
    {
        $error = null;

        foreach($this->errors as $errorData) {
            if ($exception instanceof $errorData['className']) {
                $error = $errorData;
                break;
            }
        }

        if ($error == null) {
            $error = $this->errors[0];
        }

        if ($error['registerLog']) {
            error_log("{$exception->getMessage()} in {$exception->getFile()}, line: {$exception->getLine()}");
        }

        $controller = $this->container->get($error['containerKey']);

        return $controller->run($request, (new ResponseFactory)->createResponse());
    }
}
