<?php 

	require_once 'assets/php/database.php';

	class products{


		public function __construct(){

			$objDb = new database();
			$link = $objDb->connection();
			$this->conn = $link;
		}

		public function pizzasList(){

			$query = 'SELECT * FROM products WHERE category = "pizza" ';
			$stmt = $this->conn->prepare($query);

			try {
				$stmt->execute();
				return $stmt;
				
			} catch (PDOException $e) {
				echo $e->getMessage();
				return null;
			}
		}

		public function refrigerantesList(){

			$query = 'SELECT * FROM products WHERE category = "refrigerante" ';
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