<?php
    session_start();

    if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
        // Se o usuário não estiver autenticado, exiba uma mensagem de erro
        echo "Usuário não autenticado. Por favor, faça login <a href='./login_e_cadastro/login.php'>aqui</a>.";
        exit;
    } else {

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./assets/icone.png"> <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/ranking.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ranking</title>
</head>

<body class="body-greenscore">
        <!-- Cabeçalho -->
        <header>    
            <div class="container-greescore">
                <nav>
                    <ul class="nav-links">
                        <li><a href="index.php"><img src="./assets/icone.png" class="logo"></a></li>   
                        <li><a href="index.php">AÇÔES SUSTENTÀVEIS</a></li>
                        <li><a href="premios.php">PRÊMIOS</a></li>
                        <li class="active"><a href="ranking.php">RANKING</a></li>
                        <li class="user-info">
                        <a href="#"><img src="./assets/user.png" class="user"></a>
                            <?php include 'user_info.php'; ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
<main>

<h2>Ranking de Usuários</h2>
<div class='container'>
    <table class='table table-hover table-dark rounded overflow-hidden text-center'>
        <thead>
            <tr>
                <th>Posição</th>
                <th>Nome</th>
                <th>Pontuação</th>
            </tr>
        </thead>
        <tbody>
        <!-- RANKING -->
            <?php include 'tabela_ranking.php'; ?>
        </tbody>
    </table>
</div>

</main>
<script src="./Js/script.js"></script>
</body>
</html>