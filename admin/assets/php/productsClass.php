<?php

	require_once 'assets/php/database.php';

	class products{


		public function __construct(){

			$objDb = new database();
			$link = $objDb->connection();
			$this->conn = $link;
		}

		public function pizzasList(){

			$query = 'SELECT * FROM products WHERE category = "pizzas" ORDER BY price ASC ';
			$stmt = $this->conn->prepare($query);

			try {
				$stmt->execute();
				return $stmt;
			}
			catch (PDOException $e) {
				echo $e->getMessage();
				return null;
			}
		}

		public function refrigerantesList(){

			$query = "SELECT * FROM products WHERE category = 'refrigerantes' ORDER BY price ASC ";
			$stmt = $this->conn->prepare($query);

			try {
				$stmt->execute();
				return $stmt;

			} catch (PDOException $e) {
				echo $e->getMessage();
				return null;
			}
		}

		public function bebidasList(){

			$query = 'SELECT FROM products WHERE category = "bebidas" ORDER BY price ASC ';
			$stmt  = $this->conn->prepare($query);

			try {
				$stmt->execute();
				return $stmt;

			}
			catch (PDOException $e) {
				echo $e->getMessage();
				return null;
			}

		}

		public function acrescimosList(){

			$query = 'SELECT FROM products WHERE category = "acrescimos" ORDER BY price ASC ';
			$stmt = $this->conn->prepare($query);

			try {
				$stmt->execute();
				return $stmt;
			}
			catch (PDOException $e) {
				echo $e->getMessage();




				return null;
			}

		}

		public function sucosList(){

			$query = 'SELECT FROM products WHERE category = "sucos" ORDER BY price ASC ';
			$stmt = $this->conn->prepare($query);

			try {
				$stmt->execute();
				return $stmt;
			}
			catch (PDOException $e) {
				echo $e->getMessage();




				return null;
			}

		}


	}


 ?>
