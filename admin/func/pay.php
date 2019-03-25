<?php
session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php?erro=101');
    }
    
    require_once '../assets/php/database.php';

    $objDb = new database();
    $link = $objDb->connection();

    if(isset($_POST['listar'])){

        $id_comanda = $_POST['id_request'];

        $query = "SELECT * FROM orders where requests_id_request = :id_request ";

        $stmt = $link->prepare($query);
        $stmt->bindParam(":id_request", intval($id_comanda));

        try{
            $stmt->execute();

        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Caixa</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-2 navbar-light bg-warning">
        <a class="navbar-brand" href="../menu.php">TechPizza</a>
        <button class="navbar-toggler hidden-lg-up " type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active mr-4">
                    <a class="nav-link btn btn-primary" href="../menu.php">Voltar<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>   

    <div class="container">
    
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th colspan="2">Preço</th>
                    <th>Status</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $soma = 0; ?>
                <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
                <tr>
                    <td><?=$row->description?></td>
                    <td><?=$row->quantities?></td>
                    <td colspan="2"><?=$row->price?></td>
                    <?php $soma += (float) $row->price ; ?>
                    <td><?=$row->status?></td>
                </tr>
                <?php } ?>
            </tbody>
            <thead class="thead-inverse">
                <tr>
                    <th>Soma:</th>
                    <th><?=$soma?></th>
                    <th>Gorjeta:</th>
                    <th><?=$soma*0.1?></th>
                    <th>
                        <form action="processpay.php" method="post">
                            <select name="tips" id="">
                                <option value="sim">SIM</option>
                                <option value="nao">NÃO</option>
                            </select>
                            <input type="hidden" name="id_request" value=<?=$id_comanda?>>
                            <button type="submit" name="pagar" class="btn btn-danger">Pagar</button>
                        </form>
                    </th>
                </tr>

            </thead>
        </table>

    </div>


    
</body>
</html>