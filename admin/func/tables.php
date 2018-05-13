<!doctype html>
<html lang="en">
  <head>
    <title>Mesas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>

    <?php

        require_once '../assets/php/tablesClass.php';
        
        $mesas = new Tables();
        $mesa = $mesas->tablesList();


    ?>    

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand" href="#">TechPizza</a>
        <button class="navbar-toggler hidden-lg-up " type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../menu.php">Voltar<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
        </div>
    </nav>

    <div class="row">

        <?php while($row = $mesa->fetch(PDO::FETCH_OBJ)) { ?>
        
        <div class="col-6 col-sm-4 col-md-3">
            <?php if ($row->status == 0) { ?>
                <div class="card text-center my-3">
                    <div style="background: url(../assets/imgs/livre.svg">
                        <div style="background: white; border-radius: 50%;">
                            <img class="card-img-top py-4 px-4" src="../assets/imgs/mesa.png" alt="">
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo 'MESA ' . $row->id_table ?></h4>
                        <a name="" id="" class="btn btn-success" href="#" role="button">Entrar</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card text-center my-3">
                    <div style="background: url(../assets/imgs/ocupada.svg">
                        <div style="background: white; border-radius: 50%;">
                            <img class="card-img-top py-4 px-4" src="../assets/imgs/mesa.png" alt="">
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo 'MESA ' .$row->id ?></h4>
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Entrar</a>
                    </div>
                </div>
            <?php } ?>
        </div>
            <?php } ?>

    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>