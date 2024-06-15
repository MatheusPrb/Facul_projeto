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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="body-greenscore">
    <main>
        <header>
            <div class="container-greescore">
                <nav>
                <ul class="nav-links">
                        <li><a href="index.php"><img src="./assets/icone.png" class="logo"></a></li>
                        <li><a href="index.php">AÇÕES SUSTENTÁVEIS</a></li>
                        <li class="active"><a href="premios.php">PRÊMIOS</a></li>
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

        <h1 class="titulo">Prêmios</h1>
        <?php include 'tabela_premios.php'; ?>

        <!-- Contêiner para exibir o cupom -->
        <div id="cupomContainer" class="container my-5" style="display:none;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0 smaller-card">
                        <div class="card-body text-center smaller-card-body">
                            <h5 class="card-title">Cupom Resgatado</h5>
                            <p id="cupomText"></p>
                            <p>Cada cupom é válido apenas uma vez.</p>
                            <p>Você pode encontrar seus cupons na aba Meus Cupons.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="./Js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6jG6tB7nvzPR0a2tbGQu1zRi6ZAjT5QxU0L4Ucc0T7Hjp6DU4yl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.btn-redeem').click(function() {
                var cupomId = $(this).data('id');
                var userId = <?php echo $_SESSION['user_id']; ?>;

                $.ajax({
                    url: 'resgatar_cupom.php',
                    type: 'POST',
                    data: {
                        id: cupomId,
                        user_id: userId
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            $('#cupomText').text(data.cupom);
                            $('#cupomContainer').show();
                            $('[data-id="' + cupomId + '"]').prop('disabled', true);
                            // Scroll suave até o contêiner do cupom
                        $('html, body').animate({
                        scrollTop: $('#cupomContainer').offset().top - 100 // Ajuste opcional para um deslocamento vertical
                        }, 1000);
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erro na requisição AJAX:', error);
                    }
                });
            });
        });
    </script>
</body>
</html>