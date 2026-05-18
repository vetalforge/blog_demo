<?php

use App\Controllers\MainPageController;
use App\Controllers\CategoryController;
use App\Controllers\PostController;

return $routes = [
    '/' => [
        'controller' => MainPageController::class,
        'action' => 'index'
    ],
    '/category/{id}' => [
        'controller' => CategoryController::class,
        'action' => 'show'
    ],
    '/post/{id}' => [
        'controller' => PostController::class,
        'action' => 'show'
    ],
];
