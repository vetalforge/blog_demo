<?php

use App\Controllers\MainPageController;

return $routes = [
    '/' => [
        'controller' => MainPageController::class,
        'action' => 'index'
    ],
];
