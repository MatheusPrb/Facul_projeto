<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
  include_once('../config/config.php');
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
  $stmt->bind_param("ss", $email, $senha);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows < 1) {
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location: login.php');
  } else {
      $user = $result->fetch_assoc();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
      $_SESSION['nome'] = $user['nome'];
      $_SESSION['pontos'] = $user['pontos'];
      header('Location: ../index.php');
  }
} else {
  header('Location: login.php');
}
?>
