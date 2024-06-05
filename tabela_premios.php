<?php
    include_once('./config/config.php');

    // Consulta SQL para recuperar as boas ações
    $sql = "SELECT * FROM premiacoes";
    $result = $conexao->query($sql);

    // Verifica se há boas ações
    if ($result->num_rows > 0) {
        // Exibe as boas ações em uma tabela HTML com classes do Bootstrap
        echo "<div class='container'>";
        echo "<form action='somar_pontos.php' method='post'>";
        echo "<table class='table table-hover table-dark rounded overflow-hidden text-center'>";
        echo "<thead>";
        echo "<tr><th>Nome</th><th>Descrição</th><th>Pontuação</th><th>&#x2705</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["descricao"] . "</td>";
            echo "<td>" . $row["pontos"] . "</td>";
            echo "<td><input type='checkbox' name='acao_selecionada[]' value='" . $row["id"] . "' aria-label='Marcar item'></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<input type='hidden' name='email' value='" . (isset($_POST['email']) ? $_POST['email'] : '') . "'>";
        echo "<input type='submit' name='submit' value='Somar'>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "Nenhuma premiação cadastrada.";
    }

    // Fecha a conexão
    $conexao->close();
?>