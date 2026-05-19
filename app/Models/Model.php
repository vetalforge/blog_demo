<?php

namespace App\Models;

use App\Core\Database\DbConnection;
use App\Core\Database\QueryBuilder;

abstract class Model
{
    protected string $table;

    public function __construct(
        protected DbConnection $db
    ) {}

    public function query(): QueryBuilder
    {
        return $this->db->queryBuilder($this->table);
    }
}