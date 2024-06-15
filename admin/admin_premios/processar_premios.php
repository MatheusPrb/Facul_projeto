<?php

  include_once('../../config/config.php');

// Recebe os dados do formulário
$nome = $_POST['nome'];
$cupom = $_POST['cupom'];
$pontos = $_POST['pontos'];

// Insere a nova boa ação no banco de dados
$sql = "INSERT INTO premiacoes (nome, cupom, pontos) VALUES ('$nome', '$cupom', '$pontos')";

if ($conexao->query($sql) === TRUE) {
    echo "Premiação adicionada com sucesso!";
} else {
    echo "Erro ao adicionar a boa ação: " . $conexao->error;
}

// Fecha a conexão
$conexao->close();
?>
