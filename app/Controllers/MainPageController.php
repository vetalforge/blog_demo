<?php

namespace App\Controllers;

use App\Http\{Request, Session};
use App\Models\User;
use Smarty\Smarty;

class MainPageController extends Controller
{
    public function __construct(
        Request $request,
        Session $session,
        private Smarty $templateEngine,
        private User $user
    ) {
        parent::__construct($request, $session);
    }

    public function index(): void
    {
        $categories = $this->user->query()->raw(
            'SELECT DISTINCT c.id, c.name, c.description
             FROM categories c
             INNER JOIN post_category pc ON pc.category_id = c.id
             INNER JOIN posts p ON p.id = pc.post_id
             WHERE p.published_at IS NOT NULL
             ORDER BY c.name'
        )->get();

        foreach ($categories as &$category) {
            $category['posts'] = $this->user->query()->raw(
                'SELECT
                    p.id,
                    p.title,
                    p.short_description AS description,
                    p.image,
                    p.views_count AS views,
                    p.published_at,
                    p.created_at
                 FROM posts p
                 INNER JOIN post_category pc ON pc.post_id = p.id
                 WHERE pc.category_id = ? AND p.published_at IS NOT NULL
                 ORDER BY p.published_at DESC, p.id DESC
                 LIMIT 3',
                [$category['id']]
            )->get();
        }

        unset($category);

        $this->templateEngine->assign([
            'siteName' => 'Blog demo',
            'pageTitle' => 'Home',
            'categories' => $categories,
        ]);

        $this->templateEngine->display('home.tpl');
    }
}
