<?php

include_once 'User.php';
include_once 'Todo.php';


$errors = [];

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'rootroot';
$db_name = 'ng_todo';

try {
    $db_conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    array_push($errors, $e->getMessage());
}

