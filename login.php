<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenScore</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./assets/icone.png"> <link rel="icon" type="image/png" href="favicon.png">
    
</head>
<body>
    <main>
        <div class="container">
            <div class="texto">
                <h1>Esse é o GreenScore, um site feito para transformar ações sustentaveis em premios e beneficios</h1>
                    <br><br>
                    <h2>Funciona assim:</h2>
                    <br>
                    <h3>Você realiza uma boa ação, contabiliza ela no site e acoumula pontos<br>Quando juntar bastante pontos, poderá ir na aba de trocas e escolher entre diversos premios e promoções</h3>
                    <br><br>
                    <h2>Então aproveite e bora ser sustentavel!</h2>
                </div>

                    <form action="testeLogin.php" method="POST" class="form">
                        <h1>Login</h1>
                        <br>
                        <input type="text" name="email" placeholder="Digite seu email aqui">
                        <input type="password" name="senha" placeholder="*******">
                        <input  class="button-login" type="submit" name="submit" id="submit" value="Enviar">
                        <br>
                        <a href="cadastro.php"class="button-register">Cadastre-se</a>
                    </form>
        </div>

    </main>
</body>
</html>