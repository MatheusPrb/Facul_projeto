<?php
    include_once('../config/config.php');

    $cpf_error = ''; // Variável para armazenar mensagem de erro do CPF

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Verifica se o CPF tem exatamente 11 dígitos numéricos
        if (strlen($cpf) != 11 || !is_numeric($cpf)) {
            $cpf_error = 'CPF inválido';
        } else {
            // Verifica se o CPF já está cadastrado
            $query_verifica_cpf = "SELECT cpf FROM usuarios WHERE cpf = '$cpf'";
            $result_verifica_cpf = mysqli_query($conexao, $query_verifica_cpf);

            if (mysqli_num_rows($result_verifica_cpf) > 0) {
                $cpf_error = 'CPF já cadastrado';
            } else {
                // Escape para evitar SQL Injection (recomendado)
                $nome = mysqli_real_escape_string($conexao, $nome);
                $sobrenome = mysqli_real_escape_string($conexao, $sobrenome);
                $cpf = mysqli_real_escape_string($conexao, $cpf);
                $email = mysqli_real_escape_string($conexao, $email);
                $senha = mysqli_real_escape_string($conexao, $senha);

                // Query SQL para inserir o usuário no banco de dados
                $query = "INSERT INTO usuarios(nome, sobrenome, cpf, email, senha, pontos) VALUES ('$nome','$sobrenome','$cpf','$email', '$senha', 0)";

                $result = mysqli_query($conexao, $query);

                if ($result) {
                    header('Location: login.php');
                    exit;
                } else {
                    // Se houver algum erro no banco de dados, você pode tratar aqui
                    echo "Erro ao cadastrar usuário: " . mysqli_error($conexao);
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenScore</title>
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../assets/icone.png">
    <link rel="icon" type="image/png" href="favicon.png">
</head>
    <body>
        <main>
            <form action="cadastro.php" method="POST" class="form">
                <h1>Cadastro</h1>
                <br>
                    <input type="text" name="nome" placeholder="nome">
                    <input type="text" name="sobrenome" placeholder="sobrenome">
                    <input type="text" name="cpf" placeholder="CPF (Apenas Numeros)">
                    <span id="error-cpf" class="error"></span>
                    <input type="email" name="email" placeholder="email">
                    <input type="password" name="senha" placeholder="senha">
                    <input  class="button-register" type="submit" name="submit" id="submit">
                <a href="login.php" class="voltar">Voltar</a>
            </form>
        </main>
    </body>
    <script>
    // Verifica se há erro de CPF e exibe a mensagem correspondente
    var cpfError = "<?php echo $cpf_error; ?>";
    if (cpfError) {
        document.getElementById('error-cpf').innerHTML = cpfError;
    }
</script>

</html>