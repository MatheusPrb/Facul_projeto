<?php
    include_once('./config/config.php');

    // Consulta SQL para selecionar e o nome, email e os pontos do usuario
    $sql = "SELECT nome, email, pontos FROM usuarios";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nomeUsuario = $row["nome"];
        $emailUsario = $row["email"];
        $pontosUsuario = $row["pontos"];
    }
    } else {
        echo "Usuario não encontrado";
    }
?>