<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    echo "Usuário não autenticado. Por favor, faça login <a href='./login_e_cadastro/login.php'>aqui</a>.";
    exit;
} else {
    $emailUsuario = $_SESSION['email'];
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
    <link rel="stylesheet" href="./css/teste.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="body-greenscore">
    <main>
        <!-- Cabeçalho -->
        <header class="header">
            <div class="container-greescore">
                <nav>
                    <ul class="nav-links">
                        <li><a href="index.php"><img src="./assets/icone.png" class="logo"></a></li>
                        <li class="active"><a href="index.php">AÇÕES SUSTENTÁVEIS</a></li>
                        <li><a href="premios.php">PRÊMIOS</a></li>
                        <li><a href="meus_cupons.php">MEUS CUPONS</a></li>
                        <li><a href="ranking.php">RANKING</a></li>
                        <li class="user-info">
                            <a href="#"><img src="./assets/user.png" class="user"></a>
                            <?php include 'user_info.php'; ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- TABELA -->
        <?php include 'teste.php'; ?>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="./Js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>