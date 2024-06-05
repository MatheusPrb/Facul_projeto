<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    // Se o usuário não estiver autenticado, exiba uma mensagem de erro
    echo "Usuário não autenticado. Por favor, faça login <a href='./login_e_cadastro/login.php'>aqui</a>.";
    exit;
} else {
    // Se o usuário estiver autenticado, defina a variável $logado com o e-mail do usuário
    $logado = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GreenScore</title>
    <link rel="shortcut icon" href="./assets/icone.png">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="body-greenscore">
    <main>
        <!-- Cabeçalho -->
        <header>
            <div class="container-greescore">
                <nav>
                    <ul class="nav-links">
                        <li><a href="index.php"><img src="./assets/icone.png" class="logo"></a></li>
                        <li><a href="index.php">AÇÔES SUSTENTÀVEIS</a></li>
                        <li class="active"><a href="premios.php">PRÊMIOS</a></li>
                        <li><a href="ranking.php">RANKING</a></li>
                        <li><a href=""><img src="./assets/user.png" class="user"></a></li>
                        <li><a href="./sair/sair.php" class="btn-sair">SAIR</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- TABELA -->
        <?php include 'tabela_premios.php'; ?>

    </main>


</body>
</html>