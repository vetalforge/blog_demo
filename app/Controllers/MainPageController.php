<?php

namespace App\Controllers;

use App\Http\{Request, Session};
use App\Services\HomePageService;
use App\Views\ViewRendererInterface;

class MainPageController extends Controller
{
    public function __construct(
        Request $request,
        Session $session,
        private ViewRendererInterface $view,
        private HomePageService $homePageService
    ) {
        parent::__construct($request, $session);
    }

    public function index(): void
    {
        $categories = $this->homePageService->getCategories();

        $this->view->render('home.tpl', [
            'siteName' => 'Blog demo',
            'pageTitle' => 'Home',
            'categories' => $categories,
        ]);
    }
}
