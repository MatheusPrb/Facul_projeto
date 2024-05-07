<?php
    session_start();

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');

    } else {
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
        <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">&#x2705</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Pontuação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td>Andar de Onibus</td>
                    <td>Escolher ir de onibus ao inves do carro, é uma otima ação sustentavel</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td></td>
                    <td></td>
                    <td>15</td>
                </tr>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td></td>
                    <td></td>
                    <td>20</td>
                </tr>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td></td>
                    <td></td>
                    <td>15</td>
                </tr>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td></td>
                    <td></td>
                    <td>20</td>
                </tr>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td></td>
                    <td></td>
                    <td>15</td>
                </tr>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td></td>
                    <td></td>
                    <td>20</td>
                </tr>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td></td>
                    <td></td>
                    <td>15</td>
                </tr>
                <tr>
                    <td><input type="checkbox" aria-label="Marcar item"></td>
                    <td></td>
                    <td></td>
                    <td>20</td>
                </tr>
            </tbody>
            </table>
        </div>
    </main>

<?php
   // echo "<h1>Bem vindo $logado</h1>";
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>