<?php

namespace App\Models;

interface DatabaseAdapterInterface
{
    public function executeRaw($query, $params = [], $fetch = false);

    public function insertRecord($data);

    public function selectRecord($column, $value);

    public function selectAllRecords();

    public function updateRecord($data, $column, $desiredValue);

    public function deleteRecord($column, $value);

    public function setTable($table);
}