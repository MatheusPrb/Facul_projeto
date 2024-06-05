<?php
    include_once('./config/config.php');

    // Consulta SQL para selecionar e ordenar os usuários pelos pontos (decrescente)
    $sql = "SELECT id, nome, pontos FROM usuarios ORDER BY pontos DESC";
    $result = $conexao->query($sql);

    // Verifica se há usuarios cadastrados
    if ($result->num_rows > 0) {
        $posicao = 1;
        // Saída de dados de cada linha
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $posicao . "</td>
            <td>" . $row["nome"] . "</td>
            <td>" . $row["pontos"] . "</td>
            </tr>";
            $posicao++;
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum usuário encontrado</td></tr>";
    }
    // Fecha a conexão
    $conexao->close();
?>