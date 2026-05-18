<?php

namespace App\Controllers;

use App\Http\{Request, Session};
use App\Services\PostPageService;
use Smarty\Smarty;

class PostController extends Controller
{
    public function __construct(
        Request $request,
        Session $session,
        private Smarty $templateEngine,
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

        $this->templateEngine->assign([
            'siteName' => 'Blog demo',
            'pageTitle' => $pageData['post']['title'],
            'post' => $pageData['post'],
            'relatedPosts' => $pageData['relatedPosts'],
        ]);

        $this->templateEngine->display('post.tpl');
    }
}
