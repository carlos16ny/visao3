<?php

  require_once 'database.php';

  $objDB = new database();
  $link = $objDB->connection();
  $conn = $link;

  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $func = $_POST['func'];

  $stmt = null;

  if($func == 'admin'){
    $query =  "SELECT * FROM admin WHERE password = '$pass' AND  user = '$user' ";
    $stmt = $conn->prepare($query);
    try {
      $stmt->execute();
      if($stmt->rowCount() == 0){
        header('Location: ../../index.php?erro=4');
      }
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }


  }

  else if($func == 'cashier'){
    $query =  "SELECT * FROM cashier WHERE password = '$pass' AND  user = '$user' ";
    $stmt = $conn->prepare($query);
    try {
      $stmt->execute();
      if($stmt->rowCount() == 0){
        header('Location: ../../index.php?erro=4');
      }
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

  }

  else if($func == 'waiter'){
    $query =  "SELECT * FROM waiters WHERE password = '$pass' AND  user = '$user' ";
    $stmt = $conn->prepare($query);
    try {
      $stmt->execute();
      if($stmt->rowCount() == 0){
        header('Location: ../../index.php?erro=4');
      }
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return null;
    }

  }



?>
