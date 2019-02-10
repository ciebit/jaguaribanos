<?php
namespace App\Views;

interface View
{
    public function make(array $data): string;
}
