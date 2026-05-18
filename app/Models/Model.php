<?php

namespace App\Models;

use App\Core\Database\QueryBuilder;

abstract class Model
{
    protected \PDO $pdo;
    protected string $table;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(): QueryBuilder
    {
        return new QueryBuilder($this->pdo, $this->table);
    }
}
