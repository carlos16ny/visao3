<?php 
session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php?erro=101');
    }

    require_once '../assets/php/database.php';

    $id_comanda = $_GET['id'];

    $objDb = new database();
    $link = $objDb->connection();

    if(isset($_POST['excluir'])){
        $id_order = $_POST['id_order'];
        
        $query2 = "DELETE FROM orders WHERE id_order = :id";
        $stmt2 = $link->prepare($query2);
        $stmt2->bindParam(":id", $id_order);

        try{
            $stmt2->execute();
            echo 'excluido';
        } catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    
    $query = "SELECT * FROM orders where requests_id_request = :id_request ";
    $stmt = $link->prepare($query);
    $stmt->bindParam(":id_request", intval($id_comanda));
    try{
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    
    ?>

<!doctype html>
<html lang="pt-bt">
  <head>
    <title>Lista Mesa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

    <div class="container">
    
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Status</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $soma = 0;?>
                <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
                <tr>
                    <td><?=$row->description?></td>
                    <td><?=$row->quantities?></td>
                    <td><?=$row->price?></td>
                    <?php $soma += (float) $row->price ; ?>
                    <td><?=$row->status?></td>
                    <?php if($row->status == 0) { ?>
                    <td>
                        <form action="list_comanda.php?id=<?=$id_comanda?>" method="post">
                            <input type="hidden" name="id_order" value=<?=$row->id_order?>>
                            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    <?php } else { ?>
                        <td>Produto ja atendido</td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
            <thead class="thead-inverse">
                <tr>
                    <th></th>
                    <th></th>
                    <th><?=$soma?></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        </table>

    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>