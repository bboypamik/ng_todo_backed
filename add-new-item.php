<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Max-Age: 600");


include_once 'includes/db.inc.php';


$data = json_decode(file_get_contents('php://input'), true);





$item = $data['item'];
$user_id = $data['userId'];




$sql = "INSERT INTO todos (user_id, todo_item) VALUES ($user_id, $item)";
$result = $db_conn->prepare($sql);
$result->execute();

echo json_encode(true);

