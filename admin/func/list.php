<?php

	session_start();

	if(!isset($_SESSION['user_id'])){
		header('Location: ../../404.php?erro=101');
	}
	
	$id_comanda = $_GET['id'];

	require_once '../assets/php/productsClass.php';

	$produtos = new products();
	$pizza = $produtos->pizzasList();
	$refrigerantes = $produtos->refrigerantesList();
	$bebidas = $produtos->bebidasList();
	$sucos = $produtos->sucosList();
	$acrescimos = $produtos->acrescimosList();

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

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand" href="#">TechPizza</a>
        <button class="navbar-toggler hidden-lg-up " type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active mr-4">
                    <a class="nav-link btn btn-primary mb-2" href="verify.php">Voltar<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

		<?=$id_comanda?>

		<!-- pizzas -->
		
		<section class="mb-3 mr-4 ml-4" id="">
			<div class="card border-light bg-warning">
				<div class="card-header font-weight-bold">
					<h3 class="tittle">
						<button class="btn w-100 btn-warning" data-toggle="collapse" data-target="#pizzas" aria-expanded="true">
							Pizzas
						</button>
					</h3>
				</div>
				<div id="pizzas" class="collapse">
					<div class="card-body">
						<div class="row mg-0">
						<?php while($row = $pizza->fetch(PDO::FETCH_OBJ)){ ?>
							<div class="col-6 col-md-2 col-sm-4 ml-0 mr-0 pl-1 pr-1">
								<div class="card mg-0 border-light mb-2 ">
									<img class="card-img-top rounded-circle" src='<?=$row->img?>' alt="">
									<div class="card-body">
										<h6 class="card-title"><?=$row->name?></h4>
										<p class="card-text ">
											<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=<?="#".$row->id.$row->category?> aria-expanded="false" aria-controls="collapseExample">
												<?=$row->price?>
											</button>
										</p>
										<div class="collapse mt-1" id=<?=$row->id.$row->category?>>
											<div class="">
												<form action="makeorder.php" method="post">
													<select name="size" class="form-control">
														<option value="p">P</option>
														<option value="m">M</option>
														<option value="g">G</option>
														<option value="gg">GG</option>
													</select>
													<select name="quantity" type="number" class="form-control">
														<option value="0.5">1/2</option>
														<option value="1" selected>1</option>
														<?php for ($i=2; $i<=10; ++$i) { ?>
														<option value="<?=$i?>"><?=$i?></option>
														<?php } ?>
													</select>
													<input type="text" name="observation" class="form-control">
													<input type="hidden" name="pizza_flavour" value="<?=$row->name?> ">
													<input type="hidden" name="pizza_id" value="<?=$row->id?> ">
													<input type="hidden" name="pizza_price" value="<?=$row->price?> ">
													<input type="hidden" name="id_comanda" value="<?=$id_comanda?>">
													<button type="submit" class="btn btn-danger" name="pizza">Enviar</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- bebidas -->

		<section class="mb-3 mr-4 ml-4" id="">
			<div class="card border-light bg-success">
				<div class="card-header font-weight-bold">
					<h3 class="tittle">
						<button class="btn btn-success w-100" data-toggle="collapse" data-target="#bebidas" aria-expanded="true">
							Bebidas
						</button>
					</h3>
				</div>
				<div id="bebidas" class="collapse">
					<div class="card-body">
						<div class="row mg-0">
						<?php while($row = $bebidas->fetch(PDO::FETCH_OBJ)){ ?>
							<div class="col-6 col-md-2 col-sm-4 ml-0 mr-0 pl-1 pr-1">
								<div class="card mg-0 border-light mb-2 ">
									<img class="card-img-top rounded-circle" src='<?=$row->img?>' alt="">
									<div class="card-body">
										<h6 class="card-title"><?=$row->name?></h4>
										<p class="card-text ">
											<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=<?="#".$row->id.$row->category?> aria-expanded="false" aria-controls="collapseExample">
												<?=$row->price?>
											</button>
										</p>
										<div class="collapse mt-1" id=<?=$row->id.$row->category?>>
											<div class="">
												<form action="makeorder.php" method="post">
													<select name="quantity" class="form-control">
														<?php for ($i=1; $i<=10; ++$i) { ?>
														<option value="<?=$i?>"><?=$i?></option>
														<?php } ?>
													</select>
													<input type="text" name="observation" class="form-control">
													<input type="hidden" name="drink_flavour" value="<?=$row->name?> ">
													<input type="hidden" name="drink_id" value="<?=$row->id?> ">
													<input type="hidden" name="drink_price" value="<?=$row->price?> ">
													<input type="hidden" name="id_comanda" value="<?=$id_comanda?>">
													<button type="submit" class="btn btn-warning" name="bebidas">Enviar</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>

							
		<!-- refrigerante -->

		<section class="mb-3 mr-4 ml-4" id="">
			<div class="card border-light bg-info">
				<div class="card-header font-weight-bold">
					<h3 class="tittle">
						<button class="btn w-100 btn-info" data-toggle="collapse" data-target="#refrigerantes" aria-expanded="true">
							Refrigerantes
						</button>
					</h3>
				</div>
				<div id="refrigerantes" class="collapse">
					<div class="card-body">
						<div class="row mg-0">
						<?php while($row = $refrigerantes->fetch(PDO::FETCH_OBJ)){ ?>
							<div class="col-6 col-md-2 col-sm-4 ml-0 mr-0 pl-1 pr-1">
								<div class="card mg-0 border-light mb-2 ">
									<img class="card-img-top rounded-circle" src='<?=$row->img?>' alt="">
									<div class="card-body">
										<h6 class="card-title"><?=$row->name?></h4>
										<p class="card-text ">
											<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=<?="#".$row->id.$row->category?> aria-expanded="false" aria-controls="collapseExample">
												<?=$row->price?>
											</button>
										</p>
										<div class="collapse mt-1" id=<?=$row->id.$row->category?>>
											<div class="">
												<form action="makeorder.php" method="post">
													<select name="quantity" class="form-control">
														<?php for ($i=1; $i<=10; ++$i) { ?>
														<option value="<?=$i?>"><?=$i?></option>
														<?php } ?>
													</select>
													<input type="text" name="observation" class="form-control">
													<input type="hidden" name="refri_flavour" value="<?=$row->name?> ">
													<input type="hidden" name="refri_id" value="<?=$row->id?> ">
													<input type="hidden" name="refri_price" value="<?=$row->price?> ">
													<input type="hidden" name="id_comanda" value="<?=$id_comanda?>">
													<button type="submit" class="btn btn-warning" name="refrigerantes">Enviar</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- sucos -->

		<section class="mb-3 mr-4 ml-4" id="">
			<div class="card border-light bg-danger">
				<div class="card-header font-weight-bold">
					<h3 class="tittle">
						<button class="btn w-100 btn-danger" data-toggle="collapse" data-target="#sucos" aria-expanded="true">
							Sucos
						</button>
					</h3>
				</div>
				<div id="sucos" class="collapse">
					<div class="card-body">
						<div class="row mg-0">
						<?php while($row = $sucos->fetch(PDO::FETCH_OBJ)){ ?>
							<div class="col-6 col-md-2 col-sm-4 ml-0 mr-0 pl-1 pr-1">
								<div class="card mg-0 border-light mb-2 ">
									<img class="card-img-top rounded-circle" src='<?=$row->img?>' alt="">
									<div class="card-body">
										<h6 class="card-title"><?=$row->name?></h4>
										<p class="card-text ">
											<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=<?="#".$row->id.$row->category?> aria-expanded="false" aria-controls="collapseExample">
												<?=$row->price?>
											</button>
										</p>
										<div class="collapse mt-1" id=<?=$row->id.$row->category?>>
											<div class="">
												<form action="makeorder.php" method="post">
													<select name="quantity" class="form-control">
														<?php for ($i=1; $i<=10; ++$i) { ?>
														<option value="<?=$i?>"><?=$i?></option>
														<?php } ?>
													</select>
													<input type="text" name="observation" class="form-control">
													<input type="hidden" name="suco_flavour" value="<?=$row->name?> ">
													<input type="hidden" name="suco_id" value="<?=$row->id?> ">
													<input type="hidden" name="suco_price" value="<?=$row->price?> ">
													<input type="hidden" name="id_comanda" value="<?=$id_comanda?>">
													<button type="submit" class="btn btn-warning" name="sucos">Enviar</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- acrescimos -->

		<section class="mb-3 mr-4 ml-4" id="">
			<div class="card border-light bg-dark">
				<div class="card-header font-weight-bold">
					<h3 class="tittle">
						<button class="btn w-100 btn-dark" data-toggle="collapse" data-target="#acrescimos" aria-expanded="true">
							Acrescimos
						</button>
					</h3>
				</div>
				<div id="acrescimos" class="collapse">
					<div class="card-body">
						<div class="row mg-0">
						<?php while($row = $acrescimos->fetch(PDO::FETCH_OBJ)){ ?>
							<div class="col-6 col-md-2 col-sm-4 ml-0 mr-0 pl-1 pr-1">
								<div class="card mg-0 border-light mb-2 ">
									<img class="card-img-top rounded-circle" src='<?=$row->img?>' alt="">
									<div class="card-body">
										<h6 class="card-title"><?=$row->name?></h4>
										<p class="card-text ">
											<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=<?="#".$row->id.$row->category?> aria-expanded="false" aria-controls="collapseExample">
												<?=$row->price?>
											</button>
										</p>
										<div class="collapse mt-1" id=<?=$row->id.$row->category?>>
											<div class="">
												<form action="makeorder.php" method="post">
													<select name="quantity" class="form-control">
														<?php for ($i=1; $i<=10; ++$i) { ?>
														<option value="<?=$i?>"><?=$i?></option>
														<?php } ?>
													</select>
													<input type="text" name="observation" class="form-control">
													<input type="hidden" name="acres_flavour" value="<?=$row->name?> ">
													<input type="hidden" name="acres_id" value="<?=$row->id?> ">
													<input type="hidden" name="acres_price" value="<?=$row->price?> ">
													<input type="hidden" name="id_comanda" value="<?=$id_comanda?>">
													<button type="submit" class="btn btn-warning" name="acrescimos">Enviar</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>



		<section class="mr-4 ml-4">
			<form action="makeorder.php" method="post">
				<button type="submit" name="finish" id="" class="btn btn-primary" btn-lg btn-block>Finalizar pedido</button>
			</form>
		</section>





	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>