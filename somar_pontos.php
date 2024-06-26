<?php
session_start();
header('Content-Type: application/json');

include_once('./config/config.php');

$response = array();

// Verifica se a requisição é POST e se a ação foi enviada
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['acao_id'])) {
    $acao_id = $_POST['acao_id'];
    $data_hora = date('Y-m-d H:i:s');

    // Consulta o banco de dados para obter os pontos da boa ação
    $sql = "SELECT pontos FROM boas_acoes WHERE id = $acao_id";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pontos_acao = $row['pontos'];

        // Recupera o e-mail do usuário da sessão
        $email_do_usuario = $_SESSION['email'];

        // Consulta o banco de dados para obter o ID do usuário
        $sql_get_user_id = "SELECT id FROM usuarios WHERE email = '$email_do_usuario'";
        $result_get_user_id = $conexao->query($sql_get_user_id);

        if ($result_get_user_id->num_rows > 0) {
            $row = $result_get_user_id->fetch_assoc();
            $id_do_usuario = $row['id'];

            // Atualiza os pontos do usuário usando o ID recuperado
            $sql_update = "UPDATE usuarios SET pontos = pontos + $pontos_acao WHERE id = $id_do_usuario";
            if ($conexao->query($sql_update) === TRUE) {
                // Insere a realização da ação com data/hora
                $sql_insert_acao_realizada = "INSERT INTO acoes_realizadas (usuario_id, acao_id, data_hora) VALUES ('$id_do_usuario', '$acao_id', '$data_hora')";
                if ($conexao->query($sql_insert_acao_realizada) === TRUE) {
                    $response['success'] = true;
                    $response['message'] = "Ação realizada com sucesso!";
                } else {
                    $response['success'] = false;
                    $response['message'] = "Erro ao registrar a ação: " . $conexao->error;
                }
            } else {
                $response['success'] = false;
                $response['message'] = "Erro ao somar pontos: " . $conexao->error;
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Nenhum usuário encontrado com o email $email_do_usuario.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Nenhuma ação encontrada com o ID $acao_id.";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Requisição inválida.";
}

// Retorna a resposta em formato JSON
echo json_encode($response);

// Fecha a conexão
$conexao->close();
?>
