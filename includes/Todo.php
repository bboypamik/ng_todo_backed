<?php

include_once 'db.inc.php';

class Todo
{

    private $db;

    public function __construct($db_conn)
    {
        $this->db = $db_conn;
    }

   public function get($id) {
       $sql = "SELECT * FROM todos WHERE todos.user_id = $id";
       $result = $this->db->prepare($sql);
       $result->execute();

       $data = $result->fetchAll(PDO::FETCH_ASSOC);

       echo json_encode($data);
   }

   public function add($user_id, $item, $date){
       $sql = "INSERT INTO todos (user_id, todo_item, date_time) VALUES ('$user_id', '$item', '$date')";
       $result = $this->db->prepare($sql);
       if($result->execute()){
           $id = $this->db->lastInsertId();
       }
       echo json_encode($id);
   }

   public function delete($id){
       $sql = "DELETE FROM todos WHERE id = $id";
       $result = $this->db->prepare($sql);
       $result->execute();

       echo json_encode(true);
   }
}