<?php

    require_once '../assets/php/database.php';

    class Increment{

        private $id_request;
        private $value;

        public function __construct(){

            $objDb = new database();
            $link = $objDb->connection();
            $this->conn = $link;
        
        }

        public function setIdRequest($id){
            $this->id_request = $id;
        }

        public function increment($value){

            $val = 0;

            $query = "SELECT value FROM requests WHERE id_request = '$this->id_request' ";
            $stmt = $this->conn->prepare($query);

            

            try{
                $stmt->execute();
                $val = (float) $stmt->fetch(PDO::FETCH_OBJ)->value;

                $query2 = "UPDATE requests SET value = :newvalue WHERE id_request = '$this->id_request' ";
                $stmt2 = $this->conn->prepare($query2);
                $new = (float)$val += (float)$value;
                $stmt2->bindParam("newvalue", $new);

                try{
                    $stmt2->execute();
                }catch (PDOException $ex){
                    echo $ex->getMessage();
                }
            } catch (PDOExceprion $e ){
                echo $e->getMessage();

            }



        }

    }





?>


