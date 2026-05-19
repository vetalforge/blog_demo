<?php

namespace App\Views;

class NativeTemplateRenderer implements ViewRendererInterface
{
    public function __construct(
        private TemplateEngine $templateEngine
    ) {}

    public function render(string $view, array $data = []): void
    {
        echo $this->templateEngine->render($view, $data);
    }
}
