<?php

    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php?erro=101');
    }

    require_once '../assets/php/tablesClass.php';
    require_once '../assets/php/request.php';

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php');
    
    }else{

        $table_id = $_POST['id_table'];

        $request = new Request();
        $request->setId($table_id);

        if(isset($_POST['nova'])){

            $comanda_id = $request->comandas();
            header("Location: list.php?id=$comanda_id ");

        }else if(isset($_POST['listar'])){

            $comanda_id = $request->comandas();
            header("Location: list_comanda.php?id=$comanda_id ");

        }else if(isset($_POST['fechar'])){

            $request->close_comanda();

        }   
    }


?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css
    ">
</head>
  <body>

    <style>

        .h-2{
            height: 150px;
        }
    
    </style>



    <nav class="navbar navbar-expand-lg mb-2 navbar-light bg-warning">
        <a class="navbar-brand" href="#">TechPizza</a>
        <button class="navbar-toggler hidden-lg-up " type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active mr-4">
                    <a class="nav-link btn btn-primary" href="tables.php">Voltar<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>   

    <form action="verify.php" method="post">
        <input type="hidden" name="id_table" value='<?=$table_id?>'>
        <button class="btn btn-primary w-100 btn-lg py-4 h-2 d-inline-block my-2" type="submit" name="nova">Abrir Comanda</button>
        <button class="btn btn-success w-100 btn-lg py-4 h-2 d-inline-block my-2" type="submit" name="listar">Listar</button>
        <button class="btn btn-danger w-100 btn-lg  py-4 h-2 d-inline-block my-2" type="submit" name="fechar">Fechar Comanda</button>
    </form>

        <?=$table_id?>
        <br>
        <?=$_SESSION['user']?>
        <br>
        <?=$_SESSION['user_id']?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>