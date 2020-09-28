<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bienvenido a USIP</title>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet " href="assets/css/styles.css">

</head>

<body>
    <?php  require'partials/header.php' ?>

<H1> Hola bienvenido a nuestra Web - Registrese o Inicie Sesion para empezar</H1> 

<a href="login.php"> Login</a> or
<a href="singnup.php">Signup</a>
</body>
</html>