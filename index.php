<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
header("Access-Control-Max-Age: 600");

include_once 'includes/db.inc.php';

$user = new User($db_conn);
$todo = new Todo($db_conn);

if (isset($_SERVER['REQUEST_URI'])) {
    $params = explode("/", ltrim($_SERVER['REQUEST_URI'], "/"));

}

switch ($params[0]){
    case 'login':

        $data = json_decode(file_get_contents('php://input'), true);

        if(!$data){
            return false;
        }
        $username = $data['username'];
        $password = $data['password'];

        echo  $user->login($username, $password);

        break;

    case 'register':

        $data = json_decode(file_get_contents('php://input'), true);

        if(!$data){
            return false;
        }
        $username = $data['username'];
        $password = $data['password'];

        $user->register($username, $password);

        break;

    case 'add-new-item':

        $item = $_POST['item'];
        $user_id = $_POST['userId'];
        $date = date("Y-m-d", strtotime(substr($_POST['date_time'], 0, 10)));

        $todo->add((int)$user_id, $item, $date);

        break;

    case 'get-todos':

        $id = $params[1];

        $todo->get((int)$id);

        break;

    case 'delete':

        $id =  $params[1];
        $todo->delete($id);
}
