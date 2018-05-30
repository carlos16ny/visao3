<?php

    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php?erro=101');
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
                    <a class="nav-link btn btn-primary mb-2" href="../menu.php">Voltar<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="ml-4 mr-4 pr-4 pl-4 mt-4">
            <div class="mx-auto px-4">
                <div class="mx-auto">
                    <h3 class="h3 text-center my-4">Seleciona a data de início para as gorjetas</h3>
                    <form action="tips_list.php" method="post">
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
</head>
<body>
    
</body>
</html>
