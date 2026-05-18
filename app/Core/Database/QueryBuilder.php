<?php

namespace App\Core\Database;

class QueryBuilder
{
    protected \PDO $pdo;
    protected string $table;
    protected string $select = '*';
    protected array $where = [];
    protected array $bindings = [];
    protected ?string $orderBy = null;
    protected ?int $limit = null;
    protected ?int $offset = null;
    protected ?string $rawSql = null;
    protected array $rawBindings = [];

    public function __construct(\PDO $pdo, string $table = '')
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    /**
     * SELECT columns
     */
    public function select(string $columns): self
    {
        $this->select = $columns;
        return $this;
    }

    /**
     * WHERE condition
     */
    public function where(string $column, string $operator, mixed $value): self
    {
        $this->where[] = "$column $operator ?";
        $this->bindings[] = $value;

        return $this;
    }

    /**
     * ORDER BY
     */
    public function orderBy(string $column, string $direction = 'ASC'): self
    {
        $this->orderBy = "$column $direction";
        return $this;
    }

    /**
     * LIMIT
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * OFFSET
     */
    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * RAW SQL (override builder)
     */
    public function raw(string $sql, array $bindings = []): self
    {
        $this->rawSql = $sql;
        $this->rawBindings = $bindings;

        return $this;
    }

    /**
     * GET results
     */
    public function get(): array
    {
        if ($this->rawSql) {
            return $this->execute($this->rawSql, $this->rawBindings);
        }

        $sql = $this->buildSelect();

        return $this->execute($sql, $this->bindings);
    }

    /**
     * FIRST result
     */
    public function first(): ?array
    {
        $this->limit(1);

        $result = $this->get();

        return $result[0] ?? null;
    }

    /**
     * INSERT
     */
    public function insert(array $data): bool
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";

        return $this->execute($sql, array_values($data), false);
    }

    /**
     * UPDATE
     */
    public function update(array $data): bool
    {
        $set = implode('=?, ', array_keys($data)) . '=?';

        $sql = "UPDATE {$this->table} SET $set";

        if (!empty($this->where)) {
            $sql .= " WHERE " . implode(' AND ', $this->where);
        }

        $bindings = array_merge(array_values($data), $this->bindings);

        return $this->execute($sql, $bindings, false);
    }

    /**
     * DELETE
     */
    public function delete(): bool
    {
        $sql = "DELETE FROM {$this->table}";

        if (!empty($this->where)) {
            $sql .= " WHERE " . implode(' AND ', $this->where);
        }

        return $this->execute($sql, $this->bindings, false);
    }

    /**
     * Build SELECT query
     */
    protected function buildSelect(): string
    {
        $sql = "SELECT {$this->select} FROM {$this->table}";

        if (!empty($this->where)) {
            $sql .= " WHERE " . implode(' AND ', $this->where);
        }

        if ($this->orderBy) {
            $sql .= " ORDER BY {$this->orderBy}";
        }

        if ($this->limit) {
            $sql .= " LIMIT {$this->limit}";
        }

        if ($this->offset) {
            $sql .= " OFFSET {$this->offset}";
        }

        return $sql;
    }

    /**
     * Execute query
     */
    protected function execute(string $sql, array $bindings = [], bool $fetch = true)
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($bindings);

            return $fetch
                ? $stmt->fetchAll(\PDO::FETCH_ASSOC)
                : true;

        } catch (\PDOException $e) {
            throw new \Exception("DB Error: " . $e->getMessage());
        }
    }
}