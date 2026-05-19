<?php

namespace App\Controllers;

use App\Http\{Request, Session};
use App\Services\PostPageService;
use App\Views\ViewRendererInterface;

class PostController extends Controller
{
    public function __construct(
        Request $request,
        Session $session,
        private ViewRendererInterface $view,
        private PostPageService $postPageService
    ) {
        parent::__construct($request, $session);
    }

    public function show(int $id): void
    {
        $pageData = $this->postPageService->getPageData($id);

        if (!$pageData) {
            http_response_code(404);
            require APPLICATION . 'resources/views/errors/404.php';
            return;
        }

        $this->view->render('post.tpl', [
            'siteName' => 'Blog demo',
            'pageTitle' => $pageData['post']['title'],
            'post' => $pageData['post'],
            'relatedPosts' => $pageData['relatedPosts'],
        ]);
    }
}
