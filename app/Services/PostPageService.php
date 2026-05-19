<?php

namespace App\Services;

use App\Models\Post;

class PostPageService
{
    public function __construct(
        private Post $post
    ) {}

    public function getPageData(int $postId): ?array
    {
        $post = $this->post->findPublished($postId);

        if (!$post) {
            return null;
        }

        $this->post->incrementViews($postId);
        $post['views'] = (int) $post['views'] + 1;
        $post['categories'] = $this->post->categories($postId);

        return [
            'post' => $post,
            'relatedPosts' => $this->post->related($postId, 3),
        ];
    }
}
