<?php

use App\Controllers\MainPageController;
use App\Controllers\CategoryController;
use App\Controllers\PostController;
use App\Core\Database\DbConnection;
use App\Core\Database\QueryBuilder;
use App\Http\Request;
use App\Http\Router;
use App\Http\Session;
use App\Models\Category;
use App\Models\PDOConnection;
use App\Models\Post;
use App\Services\CategoryPageService;
use App\Services\HomePageService;
use App\Services\PostPageService;
use App\Views\TemplateEngine;
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
    PDOConnection::class => function ($container) {
        $proxy = new PDOConnection();

        return $proxy::getInstance('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USER, DB_PASS);
    },
    DbConnection::class => function ($container) {
        return new DbConnection($container->get(PDOConnection::class));
    },
    Post::class => function ($container) {
        return new Post($container->get(DbConnection::class));
    },
    Category::class => function ($container) {
        return new Category($container->get(DbConnection::class));
    },
    HomePageService::class => function ($container) {
        return new HomePageService($container->get(Category::class));
    },
    CategoryPageService::class => function ($container) {
        return new CategoryPageService($container->get(Category::class));
    },
    PostPageService::class => function ($container) {
        return new PostPageService($container->get(Post::class));
    },
    TemplateEngine::class => function ($container) {
        return new TemplateEngine();
    },
    Smarty::class => function ($container) {
        $smarty = new Smarty();
        $smarty->setTemplateDir(APPLICATION . '/resources/views/');
        $smarty->setCompileDir(APPLICATION . '/storage/smarty/');
        $smarty->escape_html = true;
        $smarty->assign('baseUrl', DOMAIN_SYM ? '' : DOMAIN_ADDITION);
        return $smarty;
    },
    MainPageController::class => function ($container) {
        return new MainPageController(
            $container->get(Request::class),
            $container->get(Session::class),
            $container->get(Smarty::class),
            $container->get(HomePageService::class)
        );
    },
    CategoryController::class => function ($container) {
        return new CategoryController(
            $container->get(Request::class),
            $container->get(Session::class),
            $container->get(Smarty::class),
            $container->get(CategoryPageService::class)
        );
    },
    PostController::class => function ($container) {
        return new PostController(
            $container->get(Request::class),
            $container->get(Session::class),
            $container->get(Smarty::class),
            $container->get(PostPageService::class)
        );
    },
];
