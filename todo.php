<?php


header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
header("Access-Control-Max-Age: 600");

include_once 'includes/db.inc.php';

$id = $_GET['id'];



$sql = "SELECT * FROM todos WHERE todos.user_id = $id";
$result = $db_conn->prepare($sql);
$result->execute();

$data = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);






