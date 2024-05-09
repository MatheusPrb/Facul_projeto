<?php

  include_once('../config.php');

// Recebe os dados do formulário
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$pontos = $_POST['pontos'];

// Insere a nova boa ação no banco de dados
$sql = "INSERT INTO boas_acoes (nome, descricao, pontos) VALUES ('$nome', '$descricao', '$pontos')";

if ($conexao->query($sql) === TRUE) {
    echo "Boa ação adicionada com sucesso!";
} else {
    echo "Erro ao adicionar a boa ação: " . $conexao->error;
}

// Fecha a conexão
$conexao->close();
?>
