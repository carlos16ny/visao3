<?php
session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php?erro=101');
    }

    require_once '../assets/php/ordersClass.php';
    require_once '../assets/php/incrementValue.php';

    $orders = new Orders();
    $order = $orders->ordersList();

    if(isset($_POST['liberar'])){
        $value = $_POST['price'];
        $id = $_POST['id_request'];

        $increment = new Increment();

        try{
            $orders->setIdOrder($_POST['id_order']);
            $orders->setOrderOK();
            
            $increment->setIdRequest($id);
            $increment->increment($value);

            echo 'Liberado';
        } catch ( Exception $e){
            echo $e;
        }
        
    }

    header("refresh: 5;");


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cozinha Tech Pizza</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/">
    <script src="main.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-2 navbar-light bg-warning">
        <a class="navbar-brand" href="#">TechPizza</a>
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
    



    <table class="table table-striped w-100">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Observação</th>
                <th>Tamanho</th>
                <th>Quantidade</th>
                <th>Comanda</th>
                <th>Liberar</th>
            </tr>
            </thead>
            <tbody>
            <?php $color = ['bg-warning', 'bg-danger', 'bg-info','bg-primary']; $i=-1 ; ?>
            <?php $comanda = 0;?>
            <?php while($row = $order->fetch(PDO::FETCH_OBJ)){ ?>
            <?php if($i==3){$i=0;}; ?>
            <?php if($row->requests_id_request != $comanda) {$comanda = $row->requests_id_request; $i++; } ?>
                <tr class="<?=$color[$i]?>">
                    <td class="font-bold"><?=$row->id_order?></td>
                    <td><?=$row->description?></td>
                    <td><?=$row->observation?></td>
                    <td><?=$row->size?></td>
                    <td><?=$row->quantities?></td>
                    <td><?=$row->requests_id_request?></td>
                    <td>
                        <form action="kitchen.php" method="post">
                            <input type="hidden" name="id_order" value=<?=$row->id_order?>>
                            <input type="hidden" name="id_request" value=<?=$row->requests_id_request?>>
                            <input type="hidden" name="price" value=<?=$row->price?>>
                            <button type="submit" name="liberar" class="btn btn-success w-100">Liberar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
    </table>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>