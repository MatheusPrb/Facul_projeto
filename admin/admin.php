<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Adicionar Boa Ação</title>
</head>
<body>
    <h1>Adicionar Nova Boa Ação</h1>
    <form action="processar.php" method="post">
        <label for="nome">Nome da Boa Ação:</label><br>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao"></textarea><br><br>

        <label for="pontos">Pontuação:</label><br>
        <input type="number" id="pontos" name="pontos"><br><br>

        <input type="submit" value="Adicionar Boa Ação">
    </form>
</body>
</html>