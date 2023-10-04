    <h5>Profile</h5>
    <br>
    <h3 id="profileMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
        Perfil salvo com sucesso
    </h3>
    <form id="formProfile">
        <div class="row">
            <div class="col s5 center">
                <img src="" alt="foto" />
            </div>
        </div>
        <div class="row">
            <!-- table: info -->
            <div class="col s6 center">
                <label for="foto">Foto</label>
                <input type="file" name="profile" id="profile" accept="image/*"><br>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="Título" required>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <label for="subtitulo">Subtitulo</label>
                <input type="text" name="subtitulo" id="subtitulo" placeholder="Subtitulo(tecnologias)" required>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <input type="submit" value="Salvar">
            </div>
        </div>
    </form>
    <script>
    $(document).ready(function() {
        $('#profileMsg').hide();
        $('#formProfile').on('submit', function(event) {
            event.preventDefault();
            var formProfile = new FormData(this);
            
            $.ajax({
                url: '../../src/Portfolio/Create/Profile.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formProfile,
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
</script>