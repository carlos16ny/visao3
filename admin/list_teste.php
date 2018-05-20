<?php

	session_start();
	$id_comanda = $_GET['id'];

	require_once 'assets/php/productsClass.php';

	$pizzas = new products();
	$pizza = $pizzas->pizzasList();



?>


<!doctype html>
<html lang="pt-br">
  <head>
	<title>Mesa</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

		<?=$id_comanda?>
		<section class="container" id="">
			<div class="card">
				<div class="card-header">
					<h3 class="tittle">
						<button class="btn btn-link" data-toggle="collapse" data-target="#pizzas" aria-expanded="true" aria-controls="collapseOne">
							Pizzas
						</button>
					</h3>
				</div>
				<div id="pizzas" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div class="row">
							
						</div>
					</div>
				</div>
			</div>
			
		</section>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>