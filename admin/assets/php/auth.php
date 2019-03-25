<?php
session_start();

  require_once 'database.php';

  $objDB = new database();
  $link = $objDB->connection();
  $conn = $link;

  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $func = $_POST['func'];

  $_SESSION['function'] = $func;

  if($func == 'admin'){
    $query =  "SELECT * FROM admin WHERE user = '$user' AND password = :pass";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":pass", md5($pass));

    try {
      $stmt->execute();
      if($stmt->rowCount() == 0){
        header('Location: ../../index.php?erro=4');
      } else{
        $dados = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        $_SESSION['user'] = $dados->user;
        $_SESSION['user_id'] = $dados->id;
        header('Location: ../../menu.php');
      }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

  }

  else if($func == 'waiters'){
    $query =  "SELECT * FROM waiters WHERE password = md5($pass) AND  user = '$user' ";
    $stmt = $conn->prepare($query);
    try {
      $stmt->execute();
      if($stmt->rowCount() == 0){
        header('Location: ../../index.php?erro=4');
      } else{
        $dados = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        $_SESSION['user'] = $dados->user;
        $_SESSION['user_id'] = $dados->id;
        header('Location: ../../menu.php');
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      return null;
    }
  }

  else if($func == 'cashier'){
    $query =  "SELECT * FROM cashier WHERE password = md5($pass) AND  user = '$user' ";
    $stmt = $conn->prepare($query);
    try {
      $stmt->execute();
      if($stmt->rowCount() == 0){
        header('Location: ../../index.php?erro=4');
      } else{
        $dados = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        $_SESSION['user'] = $dados->user;
        $_SESSION['user_id'] = $dados->id;
        header('Location: ../../menu.php');
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      return null;
    }
  }
  
  else if($func == 'cooker'){
    $query =  "SELECT * FROM cooker WHERE password = md5($pass) AND  user = '$user' ";
    $stmt = $conn->prepare($query);
    try {
      $stmt->execute();
      if($stmt->rowCount() == 0){
        header('Location: ../../index.php?erro=4');
      } else{
        $dados = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        $_SESSION['user'] = $dados->user;
        $_SESSION['user_id'] = $dados->id;
        header('Location: ../../menu.php');
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      return null;
    }
  }



?>
