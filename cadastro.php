<?php

if (isset($_POST['submit'])) {

  include_once('config.php');

  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, sobrenome, cpf, email, senha) VALUES ('$nome','$sobrenome','$cpf','$email', '$senha')");
    
  header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GreenScore</title>
        <link rel="stylesheet" href="./css/cadastro.css">
        <link rel="shortcut icon" href="./assets/icone.png"> <link rel="icon" type="image/png" href="favicon.png">
    </head>
    <body>
        <main>
            <form actio="cadastro.php" method="POST" class="form">
                <h1>Cadastro</h1>
                <br>
                    <input type="text" name = "nome" placeholder="nome">
                    <input type="text" name = "sobrenome" placeholder="sobrenome">
                    <input type="text" name = "cpf" placeholder="CPF (Apenas Numeros)">
                    <input type="email" name = "email" placeholder="email">
                    <input type="password" name = "senha" placeholder="senha">
                <input  class="button-register" type="submit" name="submit" id="submit">
                <a href="./login.php" class="voltar">Voltar</a>
            </form>
        </main>
    </body>
</html>