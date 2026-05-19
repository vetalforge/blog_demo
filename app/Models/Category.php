<?php

namespace App\Models;

class Category extends Model
{
    protected string $table = 'categories';

    public function withLatestPosts(int $postsLimit = 3): array
    {
        $categories = $this->query()->raw(
            'SELECT DISTINCT c.id, c.name, c.description
             FROM categories c
             INNER JOIN post_category pc ON pc.category_id = c.id
             INNER JOIN posts p ON p.id = pc.post_id
             WHERE p.published_at IS NOT NULL
             ORDER BY c.name'
        )->get();

        foreach ($categories as &$category) {
            $category['posts'] = $this->publishedPosts(
                (int) $category['id'],
                'date',
                $postsLimit
            );
        }

        unset($category);

        return $categories;
    }

    public function find(int $categoryId): ?array
    {
        $result = $this->query()->raw(
            'SELECT c.id, c.name, c.description
             FROM categories c
             WHERE c.id = ?
             LIMIT 1',
            [$categoryId]
        )->get();

        return $result[0] ?? null;
    }

    public function countPublishedPosts(int $categoryId): int
    {
        $result = $this->query()->raw(
            'SELECT COUNT(DISTINCT p.id) AS total
             FROM posts p
             INNER JOIN post_category pc ON pc.post_id = p.id
             WHERE pc.category_id = ?
               AND p.published_at IS NOT NULL',
            [$categoryId]
        )->get();

        return (int) ($result[0]['total'] ?? 0);
    }

    public function publishedPosts(
        int $categoryId,
        string $sort = 'date',
        int $limit = 3,
        int $offset = 0
    ): array {
        $orderBy = $sort === 'views'
            ? 'p.views_count DESC, p.published_at DESC, p.id DESC'
            : 'p.published_at DESC, p.id DESC';

        return $this->query()->raw(
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
             LIMIT ' . max(1, $limit) . '
             OFFSET ' . max(0, $offset),
            [$categoryId]
        )->get();
    }
}
