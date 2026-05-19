<?php

namespace App\Services;

use App\Models\Category;

class HomePageService
{
    public function __construct(
        private Category $category
    ) {}

    public function getCategories(): array
    {
        return $this->category->withLatestPosts(3);
    }
}
