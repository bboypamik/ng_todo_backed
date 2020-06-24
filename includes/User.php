<?php

include_once 'db.inc.php';


class User{

    private $db;

    public function __construct($db_conn)
    {
        $this->db = $db_conn;
    }

    public function register($user_name, $user_password){
        try {

            $sql = "INSERT INTO users(username, password) VALUES (:user_name, :user_password)";

            $query = $this->db->prepare($sql);

            $query->bindParam(":user_name", $user_name);
            $query->bindParam(":user_password", $user_password);

            $query->execute();

        } catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }

    public function login($user_name, $user_password) {
        try {
            $sql = "SELECT * FROM users WHERE username = :user_name AND password = :user_password LIMIT 1";

            $query = $this->db->prepare($sql);



            $query->bindParam(":user_name", $user_name);
            $query->bindParam(":user_password", $user_password);

            $query->execute();

            $data = $query->fetch(PDO::FETCH_ASSOC);


            if($query->rowCount() > 0){

               return json_encode($data);


            }else{
                return json_encode(false);
            }
        }catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
}


}



