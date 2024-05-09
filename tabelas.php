<?php
    session_start();

    if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
        // Se o usuário não estiver autenticado, exiba uma mensagem de erro
        echo "Usuário não autenticado. Por favor, faça login <a href='login.php'>aqui</a>.";
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
    <link rel="shortcut icon" href="./assets/icone.png"> <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="./css/tabelas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

</head>
<body class="body-greenscore">
    <main>
        <!-- Cabeçalho -->
        <header>    
            <div class="container-greescore">
                <nav>
                    <ul class="nav-links">
                        <li><a href="./sistema.php"><img src="./assets/icone.png" class="logo"></a></li>   
                        <li class="active"><a href="">AÇÔES SUSTENTÀVEIS</a></li>
                        <li><a href="">PRÊMIOS</a></li>
                        <li><a href="">PONTOS</a></li>
                        <li><a href=""><img src="./assets/user.png" class="user"></a></li>
                        <li><a href="sair.php" class="btn-sair">SAIR</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <!-- TABELA -->
        <?php include './boas_acoes.php'; ?>
    </main>

<?php
   // echo "<h1>Bem vindo $logado</h1>";
?>
    <script src="./Js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $('form').submit(function(event){
            event.preventDefault(); // Impede o comportamento padrão do formulário

            // Envia a requisição AJAX
            $.ajax({
                url: 'somar_pontos.php',
                type: 'post',
                data: $(this).serialize(), // Serializa os dados do formulário
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        // Se a adição de pontos foi bem-sucedida, exibe a mensagem de sucesso
                        $('#mensagem').text(response.message).removeClass('error').addClass('success');
                        $(document).ready(function(){
                        $('input[type=checkbox]').prop('checked', false);
                        });
                    } else {
                        // Se ocorreu um erro, exibe a mensagem de erro
                        $('#mensagem').text(response.message).removeClass('success').addClass('error');
                    }
                },
                error: function(){
                    // Em caso de erro na requisição AJAX, exibe uma mensagem genérica de erro
                    $('#mensagem').text('Erro ao processar a solicitação').removeClass('success').addClass('error');
                }
            });
        });
    });
    </script>

    <!-- Adicione um elemento para exibir a mensagem -->
    <div id="mensagem"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>