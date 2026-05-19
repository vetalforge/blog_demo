<?php

namespace App\Views;

use Smarty\Smarty;

class SmartyRenderer implements ViewRendererInterface
{
    public function __construct(
        private Smarty $smarty
    ) {}

    public function render(string $view, array $data = []): void
    {
        $this->smarty->assign($data);
        $this->smarty->display($view);
    }
}
