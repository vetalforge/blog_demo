<?php

namespace App\Core\Database;

class DbConnection
{
    public function __construct(
        private \PDO $pdo
    ) {}

    public function queryBuilder(string $table = ''): QueryBuilder
    {
        return new QueryBuilder($this->pdo, $table);
    }
}