<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
  // Acessa
  include_once('../config/config.php');
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
  $result = $conexao->query($sql);

    if (mysqli_num_rows($result) < 1) {

      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location: login.php');
    } else {
      $user = $result->fetch_assoc();
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
      $_SESSION['nome'] = $user['nome'];
      $_SESSION['pontos'] = $user['pontos'];
      header('Location: ../index.php');
    }
}else {
  // Não Acessa
  header('Location: login.php');
  }
