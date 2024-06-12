<?php
if (isset($_SESSION['email']) && isset($_SESSION['nome']) && isset($_SESSION['pontos'])) {
    $nomeUsuario = $_SESSION['nome'];
    $emailUsuario = $_SESSION['email'];
    $pontosUsuario = $_SESSION['pontos'];
} else {
    // Redireciona para a página de login se não houver sessão ativa
    header('Location: login.php');
    exit();
}
?>

<div class="user-dropdown">
    <p>Nome: <?php echo htmlspecialchars($nomeUsuario); ?></p>
    <p>Email: <?php echo htmlspecialchars($emailUsuario); ?></p>
    <p>Pontos: <?php echo htmlspecialchars($pontosUsuario); ?></p>
    <a href="./sair/sair.php" class="btn-sair">SAIR</a>
</div>