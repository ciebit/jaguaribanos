<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Middleware\Middleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

use function date_default_timezone_set;
use function ini_set;
use function setlocale;

class Environment implements Middleware
{
    public function config(): self
    {
        setlocale(LC_ALL, 'pt_BR.UTF-8');
        date_default_timezone_set('America/Fortaleza');
        ini_set('error_log', __DIR__.'/../../../storages/logs/error.log');
        return $this;
    }

    public function process(Request $request, RequestHandler $handler): Response
    {
        $this->config();
        return $handler->handle($request);
    }
}
