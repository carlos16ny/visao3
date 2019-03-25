<?php

    require_once '../assets/php/database.php';

    class Orders{

        private $order_id;

        public function __construct(){

            $objDb = new database();
            $link = $objDb->connection();
            $this->conn = $link;
        }


        public function ordersList(){

            $query = " SELECT * FROM orders where status = '0' ";
            $stmt = $this->conn->prepare($query);
            try{
                $stmt->execute();
                return $stmt;
            } catch( PDOException $e){
                echo $e->getMessage();
                return null;
            }
        }

        public function setIdOrder($id){
            $this->order_id = $id;
        }

        public function setOrderOK(){

            $stmt = $this->conn->prepare("UPDATE orders SET status = '1' WHERE id_order = '$this->order_id' ");
            try{
                $stmt->execute();
            } catch ( PDOException $e ){
                echo $e->getMessage();
            } 
        }

    }

?>