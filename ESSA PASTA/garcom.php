<!DOCTYPE html>
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


<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">X <strong>Voltar</strong></button>
  <a href="#" class="w3-bar-item w3-button">Todos os pedidos</a>
  <a href="#" class="w3-bar-item w3-button">Meus pedidos</a>
  <a href="#" class="w3-bar-item w3-button">Sair</a>
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    
  </div>
</div>

<div id="main">



<div class="row" style="margin-left: 10rem; margin-right: 10rem; margin-top: 2rem;">
  <?php 

  for($i=0; $i<24; $i++){ ?>

    <div class="col-md-2 col-sm-4 col-6 d-flex align-items-start">
     <img style="height: 100px; width: 100px;" src="images\table.png">
     <div style="margin-left: -3.5rem; margin-top:-1.5rem;">
           <button class="btn btn-success w-30 my-auto mx-auto border-top-0"><?php echo $i+1; ?></button>
    </div>
  </div>

<?php } ?>
</div>



<script >


function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script> 

<script type="text/javascript" src="./index_files/jquery-3.2.1.slim.min.js.download"></script>
<script type="text/javascript" src="./index_files/popper.min.js.download"></script>
<script type="text/javascript" src="./index_files/bootstrap.js.download"></script>

</div></body></html>