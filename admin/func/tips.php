<?php

    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php?erro=101');
    }

    $user_id = $_SESSION['user_id'];

    require_once '../assets/php/database.php';

    $objDb = new database();
    $link = $objDb->connection();

    $dia;
    $mes;
    $ano;
    $date;

    $c = "";

    if(isset($_POST['pesquisa'])){
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $date = $ano + "-" + $mes + "-" .$dia + " 00:00:00";
    }

    $query = "SELECT value, tables_id_table, time_date FROM requests WHERE time_date >= '2018-05-17 00:00:00' AND waiters_id = '$user_id' ";
    $stmt = $link->prepare($query);

    try{
        $stmt->execute();
    }catch (PDOExcepion $e){
        echo $e->getMessage();
    }

    var_dump($stmt);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gorjetas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="main.js"></script>

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

    <div class="container">
        <div class="ml-4 mr-4 pr-4 pl-4 mt-4">
            <div class="mx-auto px-4">
                <div class="mx-auto">
                    <h3 class="h3 text-center my-4">Seleciona a data de início para as gorjetas</h3>
                    <form action="tips.php" method="post">
                        <div class="row ">
                            <div class="col-md-4 text-center">
                                <h3>Dia</h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <h3>Mês</h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <h3>Ano</h3>
                            </div>
                        </div>
                        <div class="row form-group ml-4 mr-4 pl-4 pr-4">
                            <div class="col-md-4">
                                <select class="form-control  mx-auto" name="dia" >
                                    <?php for($i=1; $i<=31; $i++) { ?>
                                    <option value=<?=$i?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control  mx-auto" name="mes" >
                                    <?php for($i=1; $i<=12; $i++) { ?>
                                    <option value=<?=$i?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control  mx-auto" name="ano" >
                                    <?php for($i=2017; $i<=2018; $i++) { ?>
                                    <option value=<?=$i?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="submit" name"pesquisa" class="btn btn-danger">Pesquisar</button>
                                </div>
                                <div class="col-md-4"></div>
                            </div> 
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($_POST['pesquisa'])){ ?>

        <table class="table table-striped">
            <thead class="thead">
                <tr>
                    <th>Dia</th>
                    <th>Mesa</th>
                    <th>Valor</th>
                </tr>
                </thead>
                <tbody>
                    <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?=$row->time_date?></td>
                        <td><?=$row->tables_id_table?></td>
                        <td><?=$row->value*0.1?></td>
                    </tr>
                    <?php var_dump($row); } ?>
                </tbody>
        </table>


    <?php } ?>

</head>
<body>
    
</body>
</html>
