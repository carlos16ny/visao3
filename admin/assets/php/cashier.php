<?php

session_start();

require_once '../assets/php/database.php';

class Cashier{

    private $id_cashier;
    private $id_comanda;
    private $id_table;
    private $id_waiter;
    private $total_value;
    private $tips = 0;
    private $dados;


    public function __construct(){

        $objDb = new database();
        $link = $objDb->connection();
        $this->conn = $link;
        

    }

    public function setIdComanda($comanda){

        $this->id_comanda = $comanda;

    }

    public function getAllComandas(){

        $query = "SELECT * FROM requests WHERE status = '1' ";
        $stmt = $this->conn->prepare($query);

        try{
            $stmt->execute();
            return $stmt;

        } catch (PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    public function getComanda(){

        $query = "SELECT * FROM requests WHERE id_request = :comanda ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":comanda", $this->id_comanda);

        try{
            $stmt->execute();
            $this->dados = $stmt->fetch(PDO::FETCH_OBJ);
            return $stmt->fetch(PDO::FETCH_OBJ);
 
        } catch (PDOException $e){
            echo $e->getMessage();

        }
    }

    public function getTips($ts){
        if($ts=="sim"){
            $this->tips = (float) $this->dados->value;
            $this->tips *= 0.1;
        }
    }

    public function encerraComanda(){
        
        $query = "UPDATE requests SET status = 2 WHERE id_request = :comanda ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":comanda", $this->id_comanda);

        try{
            $stmt->execute();
 
        } catch (PDOException $e){
            echo $e->getMessage();

        }
       
    }

    public function setAllIds(){

        $this->id_cashier = (int) $_SESSION['user_id'];;
        $this->id_comanda = (int) $this->dados->id_request;
        $this->id_table = (int) $this->dados->tables_id_table;
        $this->id_waiter = (int) $this->dados->waiters_id;
        $this->total_value = (float) $this->dados->value;
        $this->tips = (float) $this->tips;
    }

    public function createCashierComanda(){

        // if($id_cashier==""||
        //     $id_comanda==""||
        //     $id_table==""||
        //     $id_waiter==""||
        //     $tips==""||
        //     $total_value==""){
        //         echo "valores nulos";
        //     }

        // var_dump($id_cashier, $id_comanda, $id_table, $id_waiter, $total_value, $tips);
        
        $query = "INSERT INTO cashier_request VALUES (:id_cashier, :id_comanda, :id_waiter, :id_table, :tips, CURRENT_TIMESTAMP , :total_value) ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_cashier", $this->id_cashier);
        $stmt->bindParam(":id_comanda", $this->id_comanda);
        $stmt->bindParam(":id_waiter", $this->id_waiter);
        $stmt->bindParam(":id_table", $this->id_table);
        $stmt->bindParam(":tips", $this->tips);
        $stmt->bindParam(":total_value", $this->total_value);

        try{
            $stmt->execute();

        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }

    



}



?>