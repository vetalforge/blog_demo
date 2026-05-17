<?php

use App\Controllers\MainPageController;
use App\Controllers\DemoController;
use App\Controllers\TemplateEngineDemoController;

return $routes = [
    '/' => [
        'controller' => MainPageController::class,
        'action' => 'index'
    ],
    '/usage' => [
        'controller' => DemoController::class,
        'action' => 'index'
    ],
    '/template_engine_example' => [
        'controller' => TemplateEngineDemoController::class,
        'action' => 'index'
    ],
];
