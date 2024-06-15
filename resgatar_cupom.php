<?php
session_start();
include_once('./config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cupomId = $_POST['id'];
    $userId = $_POST['user_id'];

    // Verificar se o usuário já resgatou o cupom nos últimos 7 dias
    $hoje = date('Y-m-d');
    $dataLimite = date('Y-m-d', strtotime('-1 week'));
    $sql = "SELECT * FROM resgates WHERE user_id = ? AND cupom_id = ? AND DATE(data_resgate) BETWEEN ? AND ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iiss", $userId, $cupomId, $dataLimite, $hoje);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $ultimoResgate = $result->fetch_assoc();
        $dataResgate = new DateTime($ultimoResgate['data_resgate']);
        $dataFutura = $dataResgate->modify('+1 week');
        $hoje = new DateTime();

        $intervalo = $hoje->diff($dataFutura);
        $diasRestantes = $intervalo->days;
        $horasRestantes = $intervalo->h;
        $minutosRestantes = $intervalo->i;

        echo json_encode([
            'success' => false,
            'message' => "Você já resgatou este cupom. Tente novamente em $diasRestantes dias, $horasRestantes horas e $minutosRestantes minutos."
        ]);
        exit;
    }

    // Obter os pontos e o cupom da premiação
    $sql = "SELECT cupom, pontos FROM premiacoes WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $cupomId);
    $stmt->execute();
    $result = $stmt->get_result();
    $premiacao = $result->fetch_assoc();

    if ($premiacao) {
        $cupom = $premiacao['cupom'];
        $pontosNecessarios = $premiacao['pontos'];

        // Verificar se o usuário tem pontos suficientes
        $sql = "SELECT pontos FROM usuarios WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario['pontos'] >= $pontosNecessarios) {
            // Atualizar os pontos do usuário
            $novosPontos = $usuario['pontos'] - $pontosNecessarios;
            $sql = "UPDATE usuarios SET pontos = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ii", $novosPontos, $userId);
            $stmt->execute();

            // Registrar o resgate
            $sql = "INSERT INTO resgates (user_id, cupom_id, data_resgate) VALUES (?, ?, NOW())";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ii", $userId, $cupomId);
            $stmt->execute();

            echo json_encode(['success' => true, 'cupom' => $cupom]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Pontos insuficientes.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Premiação não encontrada.']);
    }
}
?>
