<?php
    session_start();

    include_once('./config/config.php');

    // Recebe os IDs das boas ações selecionadas do formulário
    $acoes_selecionadas = $_POST['acao_selecionada'];

    // Soma os pontos das boas ações selecionadas
    $total_pontos = 0;
    foreach ($acoes_selecionadas as $id_acao) {
        // Consulta o banco de dados para obter os pontos da boa ação
        $sql = "SELECT pontos FROM boas_acoes WHERE id = $id_acao";
        $result = $conexao->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $total_pontos += $row['pontos'];
            }
        }
    }

    // Recupera o e-mail do usuário da sessão
    $email_do_usuario = $_SESSION['email'];

    // Consulta o banco de dados para obter o ID do usuário
    $sql_get_user_id = "SELECT id FROM usuarios WHERE email = '$email_do_usuario'";
    $result_get_user_id = $conexao->query($sql_get_user_id);

    $response = array();

    if ($result_get_user_id->num_rows > 0) {
        $row = $result_get_user_id->fetch_assoc();
        $id_do_usuario = $row['id'];

        // Atualiza os pontos do usuário usando o ID recuperado
        $sql_update = "UPDATE usuarios SET pontos = pontos + $total_pontos WHERE id = $id_do_usuario";
        if ($conexao->query($sql_update) === TRUE) {
            $response['success'] = true;
            $response['message'] = "Pontos somados com sucesso para o usuário com o email $email_do_usuario!";
        } else {
            $response['success'] = false;
            $response['message'] = "Erro ao somar pontos: " . $conexao->error;
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Nenhum usuário encontrado com o email $email_do_usuario.";
    }

    // Retorna a resposta em formato JSON
    echo json_encode($response);

    // Fecha a conexão
    $conexao->close();
?>
