<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Adicionar Prêmios</title>
</head>
<body>
    <h1>Adicionar Nova Prêmio</h1>
    <form action="processar_premios.php" method="post">
        <label for="nome">Nome do Prêmio:</label><br>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="cupom">Cupom:</label><br>
        <textarea id="cupom" name="cupom"></textarea><br><br>

        <label for="pontos">Pontuação necessária:</label><br>
        <input type="number" id="pontos" name="pontos"><br><br>

        <input type="submit" value="Adicionar Premiação">
    </form>
</body>
</html>