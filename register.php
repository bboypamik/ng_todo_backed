<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
header("Access-Control-Max-Age: 600");

include_once 'includes/User.php';
include_once 'includes/db.inc.php';


$data = json_decode(file_get_contents('php://input'), true);

if(!$data){
    return false;
}

$username = $data['username'];
$password = $data['password'];


$user->register($username, $password);