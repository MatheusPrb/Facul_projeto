<?php
    include_once('./config.php');

    // Consulta SQL para recuperar as boas ações
    $sql = "SELECT * FROM boas_acoes";
    $result = $conexao->query($sql);

    // Verifica se há boas ações
    if ($result->num_rows > 0) {
        // Exibe as boas ações em uma tabela HTML com classes do Bootstrap
        echo "<div class='container'>";
        echo "<form action='somar_pontos.php' method='post'>";
        echo "<table class='table table-hove table-dark'>";
        echo "<thead>";
        echo "<tr><th>&#x2705</th><th>Nome</th><th>Descrição</th><th>Pontuação</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='acao_selecionada[]' value='" . $row["id"] . "' aria-label='Marcar item'></td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["descricao"] . "</td>";
            echo "<td>" . $row["pontos"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<input type='hidden' name='email' value='" . (isset($_POST['email']) ? $_POST['email'] : '') . "'>";
        echo "<input type='submit' name='submit' value='Somar'>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "Nenhuma boa ação encontrada.";
    }

    // Fecha a conexão
    $conexao->close();
?>