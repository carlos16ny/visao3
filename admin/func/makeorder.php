<?php 

    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../../404.php?erro=101');
    }

    require_once '../assets/php/database.php';

    $flavour;
    $size;
    $price;
    $id_comanda;
    $quantity;
    $product_id;
    $observ;

    if(!isset($_POST['finish'])){

        $id_comanda = $_POST['id_comanda'];
        
        if(isset($_POST['pizza'])){
            $flavour = $_POST['pizza_flavour'];
            $price = $_POST['pizza_price'];
            $size =  $_POST['size'];
            if($size == 'p')
                $price *= 0.5;
            else if($size == 'm')
                $price *= 0.7;
            else if($size == 'gg')
                $price *= 1.3;
            $quantity = (float) $_POST['quantity'];
            $product_id = $_POST['pizza_id'];
            $observ = $_POST['observation'];

            $price *= $quantity;
            

        }else if(isset($_POST['bebidas'])){
            $flavour = $_POST['drink_flavour'];
            $price = $_POST['drink_price'];
            $size = 1;
            $quantity = $_POST['quantity'];
            $product_id = $_POST['drink_id'];
            $observ = $_POST['observation'];

        }else if(isset($_POST['refrigerantes'])){
            $flavour = $_POST['refri_flavour'];
            $price = $_POST['refri_price'];
            $size = 1;
            $quantity = $_POST['quantity'];
            $product_id = $_POST['refri_id'];
            $observ = $_POST['observation'];

        }else if(isset($_POST['sucos'])){
            $flavour = $_POST['suco_flavour'];
            $price = $_POST['suco_price'];
            $size = 1;
            $quantity = $_POST['quantity'];
            $product_id = $_POST['suco_id'];
            $observ = $_POST['observation'];

        }else if(isset($_POST['acrescimos'])){
            $flavour = $_POST['acres_flavour'];
            $price = $_POST['acres_price'];
            $size =1;
            $quantity = $_POST['quantity'];
            $product_id = $_POST['acres_id'];
            $observ = $_POST['observation'];
        }

        $objDb = new database();
		$link = $objDb->connection();
        
        $query = 'INSERT INTO orders VALUES( null, :product, :price, 0, :qtde, :obs, :size, :comanda_id, :product_id )';
        
        $stmt = $link->prepare($query);


        $stmt->bindParam(":product", $flavour);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":qtde", $quantity);
        $stmt->bindParam(":obs", $observ);
        $stmt->bindParam(":size", $size);
        $stmt->bindParam(":comanda_id", $id_comanda);
        $stmt->bindParam(":product_id", $product_id);

        try{
            $stmt->execute();
            header("Location: list.php?id=$id_comanda");

        } catch (PDOExceptio $e){
            echo $e->getMessage();
        }


    }else{
         header('Location: tables.php');
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    
</body>
</html>