<?php

namespace App\Controllers;

use App\Http\{Request, Session};
use App\Services\CategoryPageService;
use App\Views\ViewRendererInterface;

class CategoryController extends Controller
{
    public function __construct(
        Request $request,
        Session $session,
        private ViewRendererInterface $view,
        private CategoryPageService $categoryPageService
    ) {
        parent::__construct($request, $session);
    }

    public function show(int $id): void
    {
        $pageData = $this->categoryPageService->getPageData(
            $id,
            Request::get('sort') ?: 'date',
            (int) (Request::get('page') ?: 1)
        );

        if (!$pageData) {
            http_response_code(404);
            require APPLICATION . 'resources/views/errors/404.php';
            return;
        }

        $this->view->render('category.tpl', [
            'siteName' => 'Blog demo',
            'pageTitle' => $pageData['category']['name'],
            'category' => $pageData['category'],
            'posts' => $pageData['posts'],
            'sort' => $pageData['sort'],
            'pagination' => $pageData['pagination'],
        ]);
    }
}
