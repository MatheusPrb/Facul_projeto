
    $(document).ready(function(){
        $('form').submit(function(event){
            event.preventDefault(); // Impede o comportamento padrão do formulário

            // Envia a requisição AJAX
            $.ajax({
                url: 'somar_pontos.php',
                type: 'post',
                data: $(this).serialize(), // Serializa os dados do formulário
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        // Se a adição de pontos foi bem-sucedida, exibe a mensagem de sucesso
                        $('#mensagem').text(response.message).removeClass('error').addClass('success');
                        $(document).ready(function(){
                        $('input[type=checkbox]').prop('checked', false);
                        });
                    } else {
                        // Se ocorreu um erro, exibe a mensagem de erro
                        $('#mensagem').text(response.message).removeClass('success').addClass('error');
                    }
                },
                error: function(){
                    // Em caso de erro na requisição AJAX, exibe uma mensagem genérica de erro
                    $('#mensagem').text('Primeiro marque as boas ações depois clique para somar').removeClass('success').addClass('error');
                }
            });
        });
    });