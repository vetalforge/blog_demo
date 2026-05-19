<?php

namespace App\Services;

use App\Models\Category;

class CategoryPageService
{
    private const POSTS_PER_PAGE = 3;

    public function __construct(
        private Category $category
    ) {}

    public function getPageData(int $categoryId, string $sort = 'date', int $page = 1): ?array
    {
        $category = $this->category->find($categoryId);

        if (!$category) {
            return null;
        }

        $sort = $sort === 'views' ? 'views' : 'date';
        $page = max(1, $page);
        $totalPosts = $this->category->countPublishedPosts($categoryId);
        $totalPages = max(1, (int) ceil($totalPosts / self::POSTS_PER_PAGE));

        if ($page > $totalPages) {
            $page = $totalPages;
        }

        return [
            'category' => $category,
            'posts' => $this->category->publishedPosts(
                $categoryId,
                $sort,
                self::POSTS_PER_PAGE,
                ($page - 1) * self::POSTS_PER_PAGE
            ),
            'sort' => $sort,
            'pagination' => [
                'current' => $page,
                'prev' => $page > 1 ? $page - 1 : null,
                'next' => $page < $totalPages ? $page + 1 : null,
                'total' => $totalPages,
            ],
        ];
    }
}
