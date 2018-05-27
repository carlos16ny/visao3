<?php

session_start();

require_once '../assets/php/database.php';
require_once '../assets/php/tablesClass.php';

class Request{

    private $id_table;

    public function __construct(){

        $objDb = new database();
        $link = $objDb->connection();
        $this->conn = $link;
        
    }

    public function setId($request_table_id){
        $this->id_table = $request_table_id;
    }

    public function comandas(){

        $query = "SELECT * FROM requests WHERE status = '0' AND tables_id_table = '$this->id_table' ORDER BY id_request DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);

        try{
            $stmt->execute();
            if($stmt->rowCount() == 0){
                $table = new Tables();
                $table->setId($this->id_table);
                $table->ocupar();
                return $this->newRequest();

            } else {
                return $stmt->fetch(PDO::FETCH_OBJ)->id_request;
            }
        } catch (PDOException $e){
            echo $e->getMessage;
        }
    
    }

    public function newRequest(){

        $request_id_waiter = $_SESSION['user_id'];

        $query = "INSERT INTO requests VALUES (null, CURRENT_TIMESTAMP, 0, 0, '$request_id_waiter', '$this->id_table')";
        $stmt = $this->conn->prepare($query);

        try{
            $stmt->execute();
            return $this->comandas();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }

    public function close_comanda(){

        $query = "UPDATE requests SET status = '1' WHERE tables_id_table = '$this->id_table' AND status = '0'";
        $stmt = $this->conn->prepare($query);

        try{
            $stmt->execute();
            $table = new Tables();
            $table->setId($this->id_table);
            $table->vagar();

        } catch (PDOException $e){

            echo $e->getMessage;
        }
    }
    

}
?>
