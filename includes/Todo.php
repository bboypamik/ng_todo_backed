<?php

include_once 'Crud.php';

class Todo extends Crud
{
    const _TABLE = 'todos';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($id)
    {

        return parent::read('*', self::_TABLE, 'user_id = ' . $id);

    }

    public function addNewItem($data)
    {

        $date = date("Y-m-d", strtotime(substr($data['date_time'], 0, 10)));
        $data[$date] = '';

        return parent::create(self::_TABLE, $data);

    }

    public function deleteItem($id)
    {
        return parent::delete(self::_TABLE, $id);

    }

}