<?php

namespace App\Services;

use App\Core\Database\QueryBuilder;

class CategoryPageService
{
    private const POSTS_PER_PAGE = 6;

    public function __construct(
        private QueryBuilder $query
    ) {}

    public function getPageData(int $categoryId, string $sort = 'date', int $page = 1): ?array
    {
        $category = $this->getCategory($categoryId);

        if (!$category) {
            return null;
        }

        $sort = $sort === 'views' ? 'views' : 'date';
        $page = max(1, $page);
        $totalPosts = $this->countPosts($categoryId);
        $totalPages = max(1, (int) ceil($totalPosts / self::POSTS_PER_PAGE));

        if ($page > $totalPages) {
            $page = $totalPages;
        }

        return [
            'category' => $category,
            'posts' => $this->getPosts($categoryId, $sort, $page),
            'sort' => $sort,
            'pagination' => [
                'current' => $page,
                'prev' => $page > 1 ? $page - 1 : null,
                'next' => $page < $totalPages ? $page + 1 : null,
                'total' => $totalPages,
            ],
        ];
    }

    private function getCategory(int $categoryId): ?array
    {
        $result = $this->query->raw(
            'SELECT c.id, c.name, c.description
             FROM categories c
             WHERE c.id = ?
             LIMIT 1',
            [$categoryId]
        )->get();

        return $result[0] ?? null;
    }

    private function countPosts(int $categoryId): int
    {
        $result = $this->query->raw(
            'SELECT COUNT(DISTINCT p.id) AS total
             FROM posts p
             INNER JOIN post_category pc ON pc.post_id = p.id
             WHERE pc.category_id = ?
               AND p.published_at IS NOT NULL',
            [$categoryId]
        )->get();

        return (int) ($result[0]['total'] ?? 0);
    }

    private function getPosts(int $categoryId, string $sort, int $page): array
    {
        $orderBy = $sort === 'views'
            ? 'p.views_count DESC, p.published_at DESC, p.id DESC'
            : 'p.published_at DESC, p.id DESC';

        return $this->query->raw(
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
             WHERE pc.category_id = ?
               AND p.published_at IS NOT NULL
             ORDER BY ' . $orderBy . '
             LIMIT ' . self::POSTS_PER_PAGE . '
             OFFSET ' . (($page - 1) * self::POSTS_PER_PAGE),
            [$categoryId]
        )->get();
    }
}
