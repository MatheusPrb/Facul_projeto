// Quando o documento estiver pronto
$(document).ready(function() {
// Função para carregar os pontos do usuário
function carregarPontos() {
    $.ajax({
        url: './get_pontos.php', // URL do seu script PHP que consulta o banco de dados
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Atualiza o conteúdo na div de pontos
            $('#pontos_usuario').text('Pontos do usuário: ' + data.pontos);
            $('#pontos_usuario2').text('Pontos do usuário: ' + data.pontos);
        },
        error: function() {
            alert('Erro ao carregar pontos do usuário.');
        }
    });
}

    // Carrega os pontos inicialmente
    carregarPontos();

    // Ao clicar no botão de atualizar
    $('#atualizar_pontos').click(function() {
        // Chama a função para carregar os pontos novamente
        carregarPontos();
    });
    $('#atualizar_pontos2').click(function() {
        // Chama a função para carregar os pontos novamente
        carregarPontos();
    });
});