<?php

declare(strict_types=1);

namespace App\Views;

use App\Views\View;
use Jenssegers\Blade\Blade;

class Html implements View
{
    private Blade $blade;
    private string $view;

    public function __construct(Blade $blade)
    {
        $this->blade = $blade;
        $this->view = '';
    }

    public function make(array $data = []): string
    {
        return $this->blade->make($this->view, $data)->__toString();
    }

    public function setView(string $view): self
    {
        $this->view = $view;
        return $this;
    }
}
