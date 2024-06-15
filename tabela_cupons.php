<?php
include_once('./config/config.php');


$userId = $_SESSION['user_id'];

// Consulta SQL para buscar os cupons resgatados pelo usuário
$sql = "SELECT premiacoes.nome, premiacoes.cupom, resgates.data_resgate 
        FROM resgates
        JOIN premiacoes ON resgates.cupom_id = premiacoes.id
        WHERE resgates.user_id = ?
        ORDER BY resgates.data_resgate DESC";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();


echo "<div class='container my-5'>";
echo "<div class='row'>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card shadow-sm card-cupom'>";
        echo "<div class='card-body text-center '>";
        echo "<h5 class='card-title titulo-cupom'>" . $row["nome"] . "</h5>";
        echo "<p class='card-text cupom'>Cupom: " . $row["cupom"] . "</p>";
        echo "<p class='card-text'>Resgatado em: " . date('d/m/Y H:i', strtotime($row["data_resgate"])) . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p class='text-center'>Nenhum cupom resgatado ainda.</p>";
}

echo "</div>";
echo "</div>";
?>
