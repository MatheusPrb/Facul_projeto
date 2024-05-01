<?php
    session_start();

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');

    } else {
        $logado = $_SESSION['email'];
    }

    include "./commons/header.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenScore</title>
    <link rel="stylesheet" href="./css/sistema.css">
    <link rel="shortcut icon" href="./assets/icone.png"> <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="./commons/css/header.css">
    

</head>
<body>
    <h1>TESTE</h1>
    <h1>TESTE</h1>
    <h1>TESTE</h1>
    <h1>TESTE</h1>
    <h1>TESTE</h1>

   <?php
        echo "<h1>Bem vindo $logado</h1>";
    ?>

    
</body>
</html>