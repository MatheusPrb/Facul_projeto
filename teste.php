<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/teste.css">
    <title>Boas Ações</title>
    <script>
        function startCountdown(element, endTime) {
            function updateCountdown() {
                const now = new Date().getTime();
                const distance = endTime - now;
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                element.innerHTML = `${hours}h ${minutes}m ${seconds}s`;

                if (distance < 0) {
                    clearInterval(interval);
                    element.innerHTML = "Pode realizar a ação";
                    location.reload();
                }
            }
            updateCountdown();
            const interval = setInterval(updateCountdown, 1000);
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Boas Ações</h1>
        <?php
        include_once('./config/config.php');

        // Recupera o e-mail do usuário da sessão
        $email_do_usuario = $_SESSION['email'];
        // Consulta o banco de dados para obter o ID do usuário
        $sql_get_user_id = "SELECT id FROM usuarios WHERE email = '$email_do_usuario'";
        $result_get_user_id = $conexao->query($sql_get_user_id);

        if ($result_get_user_id->num_rows > 0) {
            $row = $result_get_user_id->fetch_assoc();
            $id_do_usuario = $row['id'];

            // Consulta SQL para recuperar as boas ações
            $sql = "SELECT * FROM boas_acoes";
            $result = $conexao->query($sql);

            // Verifica se há boas ações
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $acao_id = $row["id"];

                    // Verifica se a ação foi realizada nas últimas 24 horas
                    $sql_check_acao = "SELECT data_hora FROM acoes_realizadas WHERE usuario_id = '$id_do_usuario' AND acao_id = '$acao_id' ORDER BY data_hora DESC LIMIT 1";
                    $result_check_acao = $conexao->query($sql_check_acao);
                    $acao_realizada = false;
                    $time_remaining = 0;

                    if ($result_check_acao->num_rows > 0) {
                        $row_check_acao = $result_check_acao->fetch_assoc();
                        $last_action_time = strtotime($row_check_acao['data_hora']);
                        $current_time = time();
                        $time_difference = $current_time - $last_action_time;
                        if ($time_difference < 86400) { // 24 horas = 86400 segundos
                            $acao_realizada = true;
                            $time_remaining = 86400 - $time_difference;
                        }
                    }

                    echo "<div class='card' id='card_$acao_id' style='" . ($acao_realizada ? "opacity: 0.5;" : "") . "'>";
                    echo "<div class='card-header' style='background-color: dodgerblue; color: white;'>";
                    echo "<p class='card-text'>" . $row["nome"] . "</p>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<p class='card-text'>" . $row["descricao"] . "</p>";
                    echo "<p class='card-text'>Pontuação: " . $row["pontos"] . "</p>";

                    if ($acao_realizada) {
                        echo "<p class='card-text'>Você só poderá realizar essa boa ação novamente em:</p>";
                        echo "<p class='card-text' id='countdown_$acao_id'></p>";
                        echo "<script>startCountdown(document.getElementById('countdown_$acao_id'), " . (time() + $time_remaining) . " * 1000);</script>";
                    } else {
                        echo "<form id='form_$acao_id' action='somar_pontos.php' method='post' onsubmit='realizarAcao(event, $acao_id)'>";
                        echo "<input type='hidden' name='acao_id' value='" . $acao_id . "'>";
                        echo "<button type='submit' class='action-button' style='background-color: dodgerblue; color: white;'>Realizar Ação</button>";
                        echo "</form>";
                    }

                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Nenhuma boa ação encontrada.";
            }
        } else {
            echo "Usuário não encontrado.";
        }

        // Fecha a conexão
        $conexao->close();
        ?>
    </div>
    <script>
        function realizarAcao(event, acaoId) {
            event.preventDefault();

            const form = document.getElementById(`form_${acaoId}`);
            const formData = new FormData(form);

            fetch('somar_pontos.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Atualiza a interface para mostrar o status da ação
                    const card = document.getElementById(`card_${acaoId}`);
                    card.style.opacity = 0.5;
                    const countdownElement = document.createElement('p');
                    countdownElement.className = 'card-text';
                    countdownElement.innerText = 'Você só poderá realizar essa boa ação novamente em:';
                    const countdownTimer = document.createElement('p');
                    countdownTimer.className = 'card-text';
                    countdownTimer.id = `countdown_${acaoId}`;
                    card.querySelector('.card-body').appendChild(countdownElement);
                    card.querySelector('.card-body').appendChild(countdownTimer);
                    startCountdown(countdownTimer, Date.now() + 24 * 60 * 60 * 1000);
                    form.remove();
                } else {
                    alert(data.message || 'Erro ao realizar a ação.');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao realizar a ação.');
            });
        }
    </script>
</body>
</html>
