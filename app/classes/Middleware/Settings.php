<?php
namespace App\Middleware;

use App\Middleware\Middleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Settings implements Middleware
{
    public function run(Request $request, Response $response, callable $next): Response
    {
        setlocale(LC_ALL, 'pt_BR.UTF-8');
        date_default_timezone_set('America/Fortaleza');
        return $next($request, $response);
    }
}
