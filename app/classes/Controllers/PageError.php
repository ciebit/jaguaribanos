<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Controller;
use App\Views\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PageError implements Controller
{
    private int $code;
    private View $view;

    public function __construct(int $code, View $view)
    {
        $this->code = $code;
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response): Response
    {
        return $this->run($request, $response);
    }

    public function run(Request $request, Response $response): Response
    {
        $html = $this->view->make();

        $response = $response
            ->withStatus($this->code)
            ->withHeader('Content-Type', 'text/html');

        $response->getBody()->write($html);

        return $response;
    }
}
