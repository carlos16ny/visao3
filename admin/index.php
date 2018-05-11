<?php

	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Tech Pizza</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
</head>

<body>
	<!--/banner-->
	<header>
		<div class="top-bar_sub container-fluid pt-2 pb-2">
			<div class="row ">
				<div class="col-md-4 top-forms text-left"  data-aos="fade-up">
					<img src="../images/logocentro.svg" style="width:95px; height: 95px;" alt="">
				</div>
				<div class="col-md-4 logo text-center" data-aos="fade-up">
						<img src="../images/logo.png" class="img-fluids navbar-img-brand border-0" alt="">
				</div>

				<style media="screen">

					.navbar-img-brand{
						width: 115px;
						height: 95px;
					}
				</style>

				<div class="col-md-4 log-icons text-right mt-4"  data-aos="fade-up">

					<ul class="social_list1">
						<li>
							<a href="#" class="facebook1 mx-2">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="#" class="pin">
								<i class="fab fa-pinterest-p"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<section class="banner-bottom yellow-bg">
		<div class="container yellow-bg">
			<h3 class="tittle">Login Funcionários</h3>
			<div class="row inner-sec">
				<div class="login p-5 bg-dark mx-auto mw-100">
					<form action="assets/php/auth.php" method="post">
						<div class="form-group">
							<label>Usuário</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="user" required="">
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input type="password" class="form-control" id="pass" placeholder="senha" required="" name="pass">
						</div>
						<div class="form-group mb-2">
							<label>Função</label>
							<select class="form-control" name="func">
								<option value="admin">Administrador</option>
								<option value="waiter">Garçom</option>
								<option value="cashier">Caixa</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary submit mb-4 mt-4">Let's cook</button>
						<?php
						if($erro == 4){	?>
							<p style="color: red;">Senha e/ou usuário incorreto(s)</p>
						<?php } ?>

					</form>
				</div>
			</div>
		</div>
	</section>
	<!--//main-->

	<!-- js -->
	<script src="../js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	 <!-- /js files -->
	<link href='../css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<link href='../css/aos-animation.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<script src='../js/aos.js'></script>
	<script src="../js/aosindex.js"></script>
	<!-- //js files -->
	<!--/ start-smoth-scrolling -->
	<script src="../js/move-top.js"></script>
	<script src="j../s/easing.js"></script>



	<!-- //Custom-JavaScript-File-Links -->
	<script src="../js/bootstrap.js"></script>
</body>

</html>
