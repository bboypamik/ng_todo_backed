<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
header("Access-Control-Max-Age: 600");


include_once 'includes/Todo.php';
include_once 'includes/User.php';


$todo = new Todo();
$user = new User();


if (isset($_SERVER['REQUEST_URI'])) {
    $params = explode("/", ltrim($_SERVER['REQUEST_URI'], "/"));

}

switch ($params[0]) {
    case 'login':

        echo json_encode($user->login($_POST));

        break;

    case 'register':

        echo json_encode($user->createNewUser($_POST));

        break;

    case 'add-new-item':

        echo json_encode($todo->addNewItem($_POST));

        break;

    case 'get-todos':

        echo json_encode($todo->getAll($params[1]));

        break;

    case 'delete':

        $id = $params[1];

        echo json_encode($todo->deleteItem($id));
}


