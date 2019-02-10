<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Views\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Error implements Controller
{
    /** @var int */
    private $code;

    /** @var View */
    private $view;

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

        $response
        ->withStatus($this->code)
        ->withHeader('Content-Type', 'text/html')
        ->getBody()->write($html);

        return $response;
    }
}
