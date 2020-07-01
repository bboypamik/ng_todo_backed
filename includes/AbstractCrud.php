<?php

include_once 'Database.php';

abstract class AbstractCrud
{

    public $db;

    protected function __construct()
    {
        $this->db = new Database();
    }

    abstract protected function create($table, $data);

    abstract protected function read($fields, $table, $where);

    abstract protected function update($table, $data, $id);

    abstract protected function delete($table, $id);


}