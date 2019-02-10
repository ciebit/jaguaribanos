<?php
namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface Middleware
{
    public function run(Request $request, Response $response, callable $next): Response;
}
