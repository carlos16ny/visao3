<!DOCTYPE html>
<html>
<head>
	<title>Tech Pizza</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<meta name="charset utf-8">
</head>
<body>

	<section class="container">
		<h1 class="h1">Pizzas</h1>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Stoque</th>
					<th scope="col">Preço</th>
					<th scope="col">Imagem</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					require_once 'assets/php/productsClass.php';
				
					$products = new products();
					$product = $products->pizzasList();


					while($row = $product->fetch(PDO::FETCH_OBJ)){

				 ?>
					<tr>
						<td><?php echo $row->name ?></td>
						<td><?php echo $row->stock ?></td>
						<td><?php echo $row->price ?></td>
						<td><img class="img-thumbnail img-fluid img-responsive" style="height: 50px; width:50px;" src=<?php echo $row->img ?>></td>
					</tr>
			
				 <?php 
			 		}
				  ?>
			</tbody>
		</table>
		<h1 class="h1">Refrigerantes</h1>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Stoque</th>
					<th scope="col">Preço</th>
					<th scope="col">Imagem</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					require_once 'assets/php/productsClass.php';
				
					$products = new products();
					$product = $products->refrigerantesList();


					while($row = $product->fetch(PDO::FETCH_OBJ)){

				 ?>
					<tr>
						<td><?php echo $row->name ?></td>
						<td><?php echo $row->stock ?></td>
						<td><?php echo $row->price ?></td>
						<td><img class="img-thumbnail img-fluid img-responsive" style="width:100px; height: 100px"e  src=<?php echo $row->img ?>></td>
					</tr>
			
				 <?php 
			 		}
				  ?>
			</tbody>
		</table>

	</section>
	


	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>