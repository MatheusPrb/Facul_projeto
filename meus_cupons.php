<?php include_once('session.php');?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meus Cupons</title>
    <link rel="shortcut icon" href="./assets/icone.png">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="./css/meus_cupons.css">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="body-greenscore">
<header>
        <div class="container-greenscore">
            <div class="logo">
                    <a href="index.php"><img src="./assets/icone.png" class="logo"></a>
            </div>
                <nav>
                    <ul class="nav-links">
                        <li><a href="index.php">AÇÕES SUSTENTÁVEIS</a></li>
                        <li><a href="premios.php">PRÊMIOS</a></li>
                        <li class="active"><a href="meus_cupons.php">MEUS CUPONS</a></li>
                        <li><a href="ranking.php">RANKING</a></li>
                        <li class="user-info">
                            <a href="#"><img src="./assets/user.png" class="user"></a>
                            <div id='user-dropdown' class='user-dropdown'>
                                <p>Nome: <?php echo ($nomeUsuario) ?></p>
                                <p>Email:<?php echo ($emailUsuario) ?></p>
                                <div class="pontos_refresh">
                                    <p id="pontos_usuario" class="pontos-usuario">Pontos do usuário: Carregando...</p>
                                    <button id="atualizar_pontos" class="fa botao-atualizar">&#xf021;</button>
                                </div>
                                <a href='./sair/sair.php' class='btn-sair'>SAIR</a>
                            </div>
                        </li>
                        <button id="menuButton" class="button-mobile" onclick="toggleSidebar()">
                            <img src="./assets/menu.png" alt="botão menu mobile">
                        </button>
                        <button id="closeButton" class="button-mobile" style="display: none;" onclick="toggleSidebar()">
                            <img src="./assets/close-button.png" alt="botão fechar">
                        </button>
                    </ul>
                </nav>
        </div>
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="container-sidebar">
                <a href="index.php">AÇÕES SUSTENTÁVEIS</a>
                <a href="premios.php">PRÊMIOS</a>
                <a class="active" href="meus_cupons.php">MEUS CUPONS</a>
                <a href="ranking.php">RANKING</a>
                <div class="pontos_refresh">
                    <p id="pontos_usuario2" class="pontos-usuario">Pontos do usuário: Carregando...</p>
                    <button id="atualizar_pontos2" class="fa botao-atualizar">&#xf021;</button>
                </div>
            <a href='./sair/sair.php' class='btn-sair'>SAIR</a>
            </div>
        </div>
    </header>
    <main>
            <h1 class="titulo">Cupons Resgatados</h1>
            <?php include_once('tabela_cupons.php'); ?>
        </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./Js/script.js"></script>
    <script src="./Js/atualiza_pontos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6jG6tB7nvzPR0a2tbGQu1zRi6ZAjT5QxU0L4Ucc0T7Hjp6DU4yl" crossorigin="anonymous"></script>
</body>
</html>