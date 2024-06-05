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
    $sql = "SELECT nome, email, pontos FROM usuarios";
    $return = $conexao->query($sql);

    if ($return->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $nomeUsuario = $row["nome"];
        $emailUsario = $row["email"];
        $pontosUsuario = $row["pontos"];
      }
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
      $_SESSION['nome'] = $nomeUsuario;
      $_SESSION['pontos'] = $pontosUsuario;
      header('Location: ../index.php');
    } else {
      echo "Usuario não encontrado";
    }
  }
} else {
  // Não Acessa
  header('Location: login.php');
}
