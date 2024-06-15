<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    echo "Usuário não autenticado. Por favor, faça login <a href='./login_e_cadastro/login.php'>aqui</a>.";
    exit;
} else {
    $emailUsuario = $_SESSION['email'];
    $nomeUsuario = $_SESSION['nome'];
}
?>