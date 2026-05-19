<?php

namespace App\Views;

interface ViewRendererInterface
{
    public function render(string $view, array $data = []): void;
}
