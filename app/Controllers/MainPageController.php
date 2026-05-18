<?php

namespace App\Controllers;

use App\Http\{Request, Session};
use App\Services\HomePageService;
use Smarty\Smarty;

class MainPageController extends Controller
{
    public function __construct(
        Request $request,
        Session $session,
        private Smarty $templateEngine,
        private HomePageService $homePageService
    ) {
        parent::__construct($request, $session);
    }

    public function index(): void
    {
        $categories = $this->homePageService->getCategories();

        $this->templateEngine->assign([
            'siteName' => 'Blog demo',
            'pageTitle' => 'Home',
            'categories' => $categories,
        ]);

        $this->templateEngine->display('home.tpl');
    }
}
