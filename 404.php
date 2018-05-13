
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Error - TechPizza</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Baked a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
</head>

	<header>
		<div class="top-bar_sub container-fluid pt-2 pb-2">
			<div class="row ">
				<div class="col-md-4 top-forms text-left" data-aos="fade-up">
					<img src="images/logocentro.svg" style="width:95px; height: 95px;" alt="">
				</div>
				<div class="col-md-4 logo text-center" data-aos="fade-up">
					<img src="images/logo.png" class="img-fluids navbar-img-brand border-0" alt="">
				</div>
	
				<style media="screen">
					.navbar-img-brand {
						width: 115px;
						height: 95px;
					}
				</style>
	
				<div class="col-md-4 log-icons text-right mt-4" data-aos="fade-up">
					<a href="admin/index.php">
						<button class="btn" style="background: #32e0ac">Login</button>
					</a>
				</div>
			</div>
		</div>
	</header>
	
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active">404 Error</li>
	</ol>
	<!--/main-->
	<section class="banner-bottom">
		<div class="container">
			<div class="error-404">
				<h4>Log-404</h4>
				<p>Efetue o login para acessar as funções</p>
				<div class="error social-icons">
				</div>
				<a class="b-home btn" href="admin/index.php">Fazer Login</a>
			</div>
		</div>
	</section>
	<!--//main-->
	<!--footer-->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 footer-grid text-left" data-aos="fade-right">
					<div class="read">
						<img src="images/logocentro.svg" alt="">
					</div>
				</div>
				<!-- subscribe -->
				<div class="col-lg-8 subscribe-main footer-grid text-left" data-aos="fade-left">
					<h2>Receba nossas promoções</h2>
					<div class="subscribe-main text-left">
						<div class="subscribe-form">
							<form action="#" method="post" class="subscribe_form">
								<input class="form-control" type="email" placeholder="Email" required="">
								<button type="submit" class="btn btn-primary submit">Submit</button>
							</form>
						</div>
						<p class="mt-3">Fique por dentro de eventos e promoções que rolam na nossa casa.</p>
					</div>
					<!-- //subscribe -->
					<div class="footer-cpy text-left">
						<div class="copyrighttop">
							<ul>
								<li class="mx-lg-3 mx-md-2 mx-1">
									<a class="facebook" href="#">
										<i class="fab fa-facebook-f"></i>
										<span>Facebook</span>
									</a>
								</li>
								<li>
									<a class="facebook" href="#">
										<i class="fab fa-pinterest-p"></i>
										<span>Pinterest</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- //footer -->
		</div>
	</footer>
	<!---->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- /js files -->
	<link href='css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<link href='css/aos-animation.css' rel='stylesheet prefetch' type="text/css" media="all" />
	<script src='js/aos.js'></script>
	<script src="js/aosindex.js"></script>
	<!-- //js files -->
	<!--/ start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
	<!--// end-smoth-scrolling -->

	<script>
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>

	<!-- //Custom-JavaScript-File-Links -->
	<script src="js/bootstrap.js"></script>


</body>

</html>