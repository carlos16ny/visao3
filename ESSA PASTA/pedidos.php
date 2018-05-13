<!DOCTYPE html>
<html>
<head>
	<title>~ TechPizza ~</title>

	<!-- saved from url=(0041)http://localhost/projeto_final/index.html -->
<html lang="pt-br"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>~TechPizza~</title>

    <!-- Required meta tags -->

    <!-- CSS Bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- w3 Schools -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./index_files/w3.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div id="main" class="w3-container">

<h2>Pizzas</h2>

<!-- <div class="row " style="margin-left: 10rem; margin-right: 10rem; margin-top: 2rem;">
<div class="col-md-2 col-sm-4 col-6 d-flex align-items-start">

	<?php 
	for ($i=1; $i<7; $i++){
	?>
	<img class="rounded-circle" src="images/img<?php echo $i;?>.png">

	<?php 
	} ?>

</div>
</div> -->

 <div class="container">
      <form action="pedidos.php" method="post">

      	
        <label>Quantidade: </label>  
        <select name="qtde">
        	<?php for ($i=1; $i<11; $i++){ 
      		?>
      		<option class ="form-control" value="<?php echo $i;?>"><?php echo $i;?></option>
      		<?php } ?>
        </select>
        <br>

        <label>Acréscimo: </label>
        <div class="custom-control custom-radio">
  			<input type="radio" id="customRadio1" name="acrescimo" class="custom-control-input">
  			<label class="custom-control-label" for="customRadio1">Cheddar</label>
		</div>
		<div class="custom-control custom-radio">
  			<input type="radio" id="customRadio2" name="acrescimo" class="custom-control-input">
  			<label class="custom-control-label" for="customRadio2">Catupiry</label>
		</div>

		<div class="custom-control custom-radio">
  			<input type="radio" id="customRadio1" name="acrescimo" class="custom-control-input">
  			<label class="custom-control-label" for="customRadio1">Borda de Cheddar</label>
		</div>
		<div class="custom-control custom-radio">
  			<input type="radio" id="customRadio2" name="acrescimo" class="custom-control-input">
  			<label class="custom-control-label" for="customRadio2">Borda de Catupiry</label>
		</div>

        <!-- <label>Nome</label>  
        <input type="text" name="name" required>
        <br> -->

		<!--  Tamanho Pizza 	--> 
        <label>Tamanho: </label>  
        <select name="tamanho">
          <option class ="form-control" value ="P">P</option>
          <option class ="form-control" value ="M">M</option>
          <option class ="form-control" value ="G">G</option>
          <option class ="form-control" value="F">F</option>
        </select>
        <br>

        <!--  Tamanho Bebida 	--> 

        <label>Tamanho: </label>  
        <select name="tamanho" >
          <option class ="form-control" value ="P">Lata</option>          
          <option class ="form-control" value ="G">2 L</option>
      </select>

         <label>Latas: </label>
        <select name="latas">
        <option class ="form-control" value ="1">Coca Cola</option>
        <option class ="form-control" value ="2">Fanta Laranja</option>
        <option class ="form-control" value ="3">Fanta Uva</option>
        <option class ="form-control" value ="4">Pepsi</option>
        <option class ="form-control" value ="5">Guaraná</option>
        <option class ="form-control" value ="6">Suco Goiaba</option>
        <option class ="form-control" value ="7">Suco Uva</option>
        </select>

        

	<!--   Drinks/Sucos Naturais	 -->

         <label>Drinks: </label>
        <select name="latas">
        <option class ="form-control" value ="1">Caipirinha</option>
        <option class ="form-control" value ="2">Margarita</option>
        <option class ="form-control" value ="3">Aperol Spritz</option>
        <option class ="form-control" value ="4">Sex on the Beach</option>
        <option class ="form-control" value ="5">Limonada</option>
        <option class ="form-control" value ="7">Suco Laranja</option>
        </select>
        

      </form>
    </div>


<script type="text/javascript" src="./index_files/jquery-3.2.1.slim.min.js.download"></script>
<script type="text/javascript" src="./index_files/popper.min.js.download"></script>
<script type="text/javascript" src="./index_files/bootstrap.js.download"></script>

</div></body></html>

</body>
</html>