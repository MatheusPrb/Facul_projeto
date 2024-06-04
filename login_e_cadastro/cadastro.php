<?php
    include_once('../config/config.php');

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, sobrenome, cpf, email, senha, pontos) VALUES ('$nome','$sobrenome','$cpf','$email', '$senha', 0)");
    
        if ($result) {
            header('Location: login.php');
            exit;
        } else {
            // Se houver algum erro no banco de dados, você pode tratar aqui
            echo "Erro ao cadastrar usuário.";
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GreenScore</title>
        <link rel="stylesheet" href="../css/cadastro.css">
        <link rel="shortcut icon" href="../assets/icone.png"> <link rel="icon" type="image/png" href="favicon.png">
    </head>
    <body>
        <main>
            <form action="cadastro.php" method="POST" class="form">
                <h1>Cadastro</h1>
                <br>
                    <input type="text" name="nome" placeholder="nome">
                    <input type="text" name="sobrenome" placeholder="sobrenome">
                    <input type="text" name="cpf" placeholder="CPF (Apenas Numeros)">
                    <input type="email" name="email" placeholder="email">
                    <input type="password" name="senha" placeholder="senha">
                    <input  class="button-register" type="submit" name="submit" id="submit">
                <a href="login.php" class="voltar">Voltar</a>
            </form>
        </main>
    </body>
</html>