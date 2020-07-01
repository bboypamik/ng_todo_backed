<?php


class Database
{


    const DB_HOST = 'localhost';
    const DB_NAME = 'ng_todo';
    const DB_USER = 'root';
    const DB_PASSWORD = 'rootroot';

    private $conn;


    private $errors = [];

    public function __construct()
    {

        $this->conn = $this->connect(self::DB_HOST, self::DB_NAME, self::DB_USER, self::DB_PASSWORD);
    }

    private function connect($db_host, $db_name, $db_user, $db_pass)
    {
        try {
            $db_conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
            $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db_conn;
        } catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

}