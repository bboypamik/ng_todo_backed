<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

$servername = "localhost";
$dbname = "ng_todo";
$dbUsername = "root";
$dbPassword = "rootroot";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$json = file_get_contents('php://input');
$data = json_decode($json);

$username = $data->username;
$password = $data->password;

//$username = $_POST['username'];
//$password = $_POST['password'];
//


$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

print_r($username);

if (mysqli_num_rows($result) == 1) {
     echo json_encode(true);
}else {
    echo json_encode(false);
}