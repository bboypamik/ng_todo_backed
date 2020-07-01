<?php


include_once 'Crud.php';


class User extends Crud
{

    const _TABLE = 'users';

    public function __construct()
    {
        parent::__construct();

    }

    public function createNewUser($data)
    {

        return parent::create(self::_TABLE, $data);


    }

    public function login($data)
    {

        $username = $data['username'];
        $password = $data['password'];


        $query = parent::read("*", self::_TABLE, " username = '" . $username . "' AND password= '" . $password . "'");

        $login = array_shift($query);

        if ($login == null) {
            return false;

        } else {
            return $login;
        }
    }
}



