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
    

    $query = "SELECT waiter_tips, requests_tables_id_table, date FROM cashier_request WHERE date >= '$date' AND requests_waiters_id_waiter = '$user_id' ";
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
                    <a class="nav-link btn btn-primary mb-2" href="tips.php">Voltar<span class="sr-only">(current)</span></a>
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
                                <th>Dia</th>
                                <th>Mesa</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $soma = 0; ?>
                            <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                            <?php if($row->waiter_tips > 0) { ?>
                            <tr>
                                <td><?=$row->date?></td>
                                <td><?=$row->requests_tables_id_table?></td>
                                <td><?=$row->waiter_tips?></td>
                                <?php $soma += (float) $row->waiter_tips; ?>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                        <thead class="thead">
                            <tr>
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
