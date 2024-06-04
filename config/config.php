<?php
$dbhost = 'localhost'; 
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'greenscore';

// Criar conexão
$conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
}
?>
