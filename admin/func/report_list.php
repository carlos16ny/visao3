<?php

    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php?erro=101');
    }

    $user_id = $_SESSION['user_id'];

    require_once '../assets/php/database.php';

    $objDb = new database();
    $link = $objDb->connection();

    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $date = $ano . "-" . $mes . "-" . $dia . " 00:00:00";
    

    $query = "SELECT id_request, time_date, value, waiters_id, tables_id_table FROM requests WHERE time_date >= '$date' ";
    $stmt = $link->prepare($query);

    try{
        $stmt->execute();
    }catch (PDOExcepion $e){
        echo $e->getMessage();
    }


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
        <a class="navbar-brand" href="../menu.php">TechPizza</a>
        <button class="navbar-toggler hidden-lg-up " type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active mr-4">
                    <a class="nav-link btn btn-primary mb-2" href="report.php">Voltar<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="ml-4 mr-4 pr-4 pl-4 mt-4">
            <div class="mx-auto px-4">
                <div class="mx-auto">
                    <table class="table table-striped">
                        <thead class="thead">
                            <tr>
                                <th>Comanda</th>
                                <th>Mesa</th>
                                <th>Dia</th>
                                <th>Garçom</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $soma = 0; ?>
                            <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><?=$row->id_request?></td>
                                <td><?=$row->tables_id_table?></td>
                                <td><?=$row->time_date?></td>
                                <td><?=$row->waiters_id?></td>
                                <td><?=$row->value?></td>
                                <?php $soma += (float) $row->value; ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <thead class="thead">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Soma:</th>
                                <th><?=$soma?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</head>
<body>
    
</body>
</html>
