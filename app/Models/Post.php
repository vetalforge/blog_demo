<?php

namespace App\Models;

class Post extends Model
{
    protected string $table = 'posts';

    public function findPublished(int $postId): ?array
    {
        $result = $this->query()->raw(
            'SELECT
                p.id,
                p.title,
                p.short_description AS description,
                p.content,
                p.image,
                p.views_count AS views,
                p.published_at,
                p.created_at
             FROM posts p
             WHERE p.id = ?
               AND p.published_at IS NOT NULL
             LIMIT 1',
            [$postId]
        )->get();

        return $result[0] ?? null;
    }

    public function incrementViews(int $postId): void
    {
        $this->query()->raw(
            'UPDATE posts
             SET views_count = views_count + 1
             WHERE id = ?',
            [$postId]
        )->get();
    }

    public function categories(int $postId): array
    {
        return $this->query()->raw(
            'SELECT c.id, c.name, c.description
             FROM categories c
             INNER JOIN post_category pc ON pc.category_id = c.id
             WHERE pc.post_id = ?
             ORDER BY c.name',
            [$postId]
        )->get();
    }

    public function related(int $postId, int $limit = 3): array
    {
        return $this->query()->raw(
            'SELECT DISTINCT
                p.id,
                p.title,
                p.short_description AS description,
                p.image,
                p.views_count AS views,
                p.published_at,
                p.created_at
             FROM posts p
             INNER JOIN post_category pc ON pc.post_id = p.id
             WHERE pc.category_id IN (
                 SELECT category_id
                 FROM post_category
                 WHERE post_id = ?
             )
               AND p.id <> ?
               AND p.published_at IS NOT NULL
             ORDER BY p.published_at DESC, p.id DESC
             LIMIT ' . max(1, $limit),
            [$postId, $postId]
        )->get();
    }
}
