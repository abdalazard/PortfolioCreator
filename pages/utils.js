$(document).ready(function() {
    $('#profileMsg').hide();
    $('#formProfile').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: '../../src/Portfolio/Create/Profile.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(response) {
                $('#profileMsg').show();
               // Limpar os campos do formulário
                $('#profile').val('');
                $('#titulo').val('');
                $('#subtitulo').val('');

                $('#formProfile').hide();

            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });
});