<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Views\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ContentStatic implements Controller
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function run(Request $request, Response $response): Response
    {
        $html = $this->view->make();
        $response->getBody()->write($html);
        return $response;
    }
}
