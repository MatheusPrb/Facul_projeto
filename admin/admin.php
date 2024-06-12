<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Adicionar Boa Ação</title>
    <style>
        body {
            background-color: #98FF98;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            color: black;
        }
        form {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: dodgerblue;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            padding: 10px 20px;
        }
        input[type="submit"]:hover {
            background-color: #1E90FF;
        }
    </style>
</head>
<body>
    <h1>Adicionar Nova Boa Ação</h1>
    <form action="processar.php" method="post">
        <label for="nome">Nome da Boa Ação:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" required></textarea><br><br>

        <label for="pontos">Pontuação:</label><br>
        <input type="number" id="pontos" name="pontos" required><br><br>

        <input type="submit" value="Adicionar Boa Ação">
    </form>
</body>
</html>
