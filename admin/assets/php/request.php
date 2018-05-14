<?php

session_start();

require_once '../assets/php/database.php';

class Request{

    public function __construct(){

        $objDb = new database();
        $link = $objDb->connection();
        $this->conn = $link;
        
    }

    public function setId(){

    }

    public function comandas($request_table_id){

        $query = "SELECT * FROM requests WHERE status = '0' AND tables_id_table = '$request_table_id' ORDER BY id_request DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);

        try{
            $stmt->execute();
            if($stmt->rowCount() == 0){
                newRequest($request_table_id);
            } else {
                return $stmt->fetch();
            }
        } catch (PDOException $e){
            echo $e->getMessage;
        }
    



    }

    public function newRequest($request_table_id){

        $request_id_waiter = $_SESSION['user_id'];

        $query = "INSERT INTO requests VALUES (null, CURRENT_TIMESTAMP, 0, 0, '$request_id_waiter', '$request_table_id')";
        $stmt = $this->conn->prepare($query);

        try{
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }

}
?>
