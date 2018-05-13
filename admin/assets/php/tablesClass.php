<?php 

	require_once '../assets/php/database.php';
	

	class Tables{

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

	}

 ?>