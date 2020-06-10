<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
header("Access-Control-Max-Age: 600");

include_once 'includes/db.inc.php';



$id = $_GET['id'];

echo $id;

$sql = "DELETE FROM todos WHERE id = $id";
$result = $db_conn->prepare($sql);
$result->execute();

 echo json_encode(true);

