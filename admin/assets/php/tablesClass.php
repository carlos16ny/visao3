<?php 

	require_once '../assets/php/database.php';
	

	class Tables{

		private $table_id;
		private $status;

		public function __construct(){

			$objDb = new database();
			$link = $objDb->connection();
			$this->conn = $link;
		}

		public function tablesList(){

			$query = "SELECT * FROM tables WHERE 1";
			$stmt = $this->conn->prepare($query);

			try {
				$stmt->execute();
				return $stmt;

			} catch (PDOException $e) {
				echo $e->getMessage();
				return null;
			}
		}

		public function setId($id){
			$this->table_id = $id;
		}

		public function ocupar(){
			$stmt = $this->conn->prepare('UPDATE tables SET status = 1 WHERE id_table = :id');
			$stmt->bindParam(":id", $this->table_id);
			try{
				$stmt->execute();
			} catch (PDOException $e){
				return $e->getMessage;
			}
		}

		public function vagar(){
			$stmt = $this->conn->prepare('UPDATE tables SET status = 0 WHERE id_table = :id');
			$stmt->bindParam(":id", $this->table_id);
			try{
				$stmt->execute();
			} catch (PDOException $e){
				echo $e->getMessage;
				return null;
			}
		}

	}

 ?>