<link rel="stylesheet" href="./css/premios.css">

<?php
include_once('./config/config.php');

$sql = "SELECT id, nome, pontos FROM premiacoes";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container my-5'>";
    echo "<div class='row'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card shadow-sm border-0'>";
        echo "<div class='card-body text-center'>";
        echo "<div class='card-icon mb-3'><i class='fas'></i></div>";
        echo "<h5 class='card-title'>" . $row["nome"] . "</h5>";
        echo "<p class='card-text'><strong>Pontos: " . $row["pontos"] . "</strong></p>";
        echo "<button class='btn btn-redeem action-button' data-id='" . $row["id"] . "' data-nome='" . $row["nome"] . "' data-pontos='" . $row["pontos"] . "'>Resgatar</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
} else {
    echo "<p class='text-center'>Nenhuma premiação cadastrada.</p>";
}

$conexao->close();
?>
