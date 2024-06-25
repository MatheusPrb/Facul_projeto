<?php
include_once('./config/config.php');
include_once('session.php');

// Preparar a consulta
$sql = "SELECT pontos FROM usuarios WHERE email = ?";
$stmt = $conexao->prepare($sql);

// Vincular parâmetros e executar a consulta
$stmt->bind_param("s", $emailUsuario); // "s" indica que $emailUsuario é uma string
$emailUsuario = $_SESSION['email']; // Defina $emailUsuario com o valor apropriado
$stmt->execute();

// Processar o resultado
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    echo json_encode(array('mensagem' => '0 resultados'));
}

// Fechar statement e conexão
$stmt->close();
$conexao->close();
