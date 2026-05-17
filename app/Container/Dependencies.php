<?php

use App\Http\Request;
use App\Http\Session;
use App\Controllers\MainPageController;
use App\Http\Router;
use App\Models\PDOAdapter;
use App\Models\PDOConnection;
use App\Views\TemplateEngine;
use App\Models\User;
use Smarty\Smarty;

return [
    Router::class => function ($container) {
        return new Router(require_once APPLICATION . 'config/routes.php');
    },
    Request::class => function ($container) {
        return new Request(DOMAIN_SYM, DOMAIN_ADDITION);
    },
    Session::class => function ($container) {
        return new Session();
    },
    Smarty::class => function ($container) {
        $smarty = new Smarty();
        $smarty->setTemplateDir(APPLICATION . '/resources/views/');
        $smarty->setCompileDir(APPLICATION . '/storage/smarty/');
        $smarty->escape_html = true;
        return $smarty;
    },
    PDOConnection::class => function ($container) {
        $proxy = new PDOConnection();

        return $proxy::getInstance('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USER, DB_PASS);
    },
    PDOAdapter::class => function ($container) {
        return new PDOAdapter($container->get(PDOConnection::class));
    },
    User::class => function ($container) {
        return new User($container->get(PDOAdapter::class));
    },
    MainPageController::class => function ($container) {
        return new MainPageController(
            $container->get(Request::class),
            $container->get(Session::class),
            $container->get(User::class),
            $container->get(Smarty::class),
        );
    },
    TemplateEngine::class => function ($container) {
        return new TemplateEngine();
    },
];