<?php

namespace App\Core\Database;

class DatabaseSeeder
{
    public function __construct(private \PDO $pdo) {}

    public function run(): void
    {
        $seeds = [
            'create_tables.sql',
            'create_users.sql',
            'create_categories.sql',
            'create_posts.sql',
            'create_post_categories.sql',
        ];

        foreach ($seeds as $file) {
            $this->pdo->exec(file_get_contents(APPLICATION . '/database/' . $file));
        }
    }
}