<?php

    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../404.php?erro=101');
    }

    $c="";
    $w="";


    if($_SESSION['function']=='cashier'){ 
        $c = "c";
    }else if($_SESSION['function']=='waiters'){
        $w = "w";
    }
    
?>


<!doctype html>
<html lang="pt-br">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
      
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-4 col-sm-6 bg-1 mb-3 br-3 <?=$c?>" role="button">
              <a href="func/tables.php"><i class="fas fa-utensils fa-10x py-4 px-4" style="color: #fff"></i></a>
              <h2 class="h2 pb-3 px-4 text-menu">Mesas</h1>
          </div>
          <div class="col-md-4 col-sm-6 bg-2 mb-3">
              <a href="func/orders.php"><i class="fas fa-receipt fa-10x py-4 px-4" style="color: #fff"></i></a>
              <h2 class="h2 pb-3 px-4 text-menu">Comandas</h1>
          </div>
          <div class="col-md-4 col-sm-6 bg-3 mb-3 <?=$c?>">
              <a href="func/tips.php"><i class="fas fa-coins fa-10x py-4 px-4 " style="color: #fff"></i></a>
              <h2 class="h2 pb-3 px-4 text-menu">Gorjetas</h1>
          </div>
          <div class="col-md-4 col-sm-6 bg-4 mb-3 <?=$w?>">
              <a href="func/cashier.php"><i class="fas fa-donate fa-10x py-4 px-4" style="color: #fff"></i></a>
              <h2 class="h2 pb-3 px-4 text-menu">Caixa</h1>
          </div>
          <div class="col-md-4 col-sm-6 bg-5 mb-3 <?=$w . " " .$c?>">
              <a href="func/report.php"><i class="fas fa-chart-line fa-10x py-4 px-4" style="color: #fff"></i></a>
              <h2 class="h2 pb-3 px-4 text-menu">Relatórios</h1>
          </div>

          <div class="col-md-4 col-sm-6 bg-6 mb-3">
              <a href="func/logout.php"><i class="fas fa-arrow-circle-right fa-10x py-4 px-4" style="color: #fff"></i></a>
              <h2 class="h2 pb-3 px-4 text-menu">Sair</h1>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>