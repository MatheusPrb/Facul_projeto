<?php
$dbhost = 'sql206.infinityfree.com'; 
$dbUsername = 'if0_36733703';
$dbPassword = 'Matheus220404';
$dbName = 'if0_36733703_greenscore';

// Criar conexão
$conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
}
?>
