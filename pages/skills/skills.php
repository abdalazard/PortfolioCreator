    <h5>Skills</h5>
    
    <div class="row">
        <div class="col s6 center">
            <h3 id="skillMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
                Perfil salvo com sucesso
            </h3>
            <a href="#modalSkills" class="modal-trigger">Adicione mais de uma logo</a>
        </div>
    </div>
    <br>
    <!-- table: projects -->
    <div id="modalSkills" class="modal modalSkills">
        <div class="row">
            <div class="col s2 offset-s10">
                <a href="#!" class="modal-close btn-white black-text closeButton" id="closeButton">Fechar</a>
            </div>
        </div>
        <div class="row">
            <div class="col s6 center">
                <h3 id="skillMsg2" style="font-size: 15px; background-color: green; color: white; text-align:center;">
                    Perfil salvo com sucesso
                </h3>
            </div>
        </div>
        <div class="modal-content">
            <form id="formSkills" enctype="multipart/form-data">
                <div class="row">
                    <div class="col s12 ">
                        <label for="skill">Habilidade(Adicione várias imagens renderizada das stacks)</label>
                        <input type="file" name="skill[]"  id="skill" multiple accept="image/*">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 ">
                    <button type="submit" id="gravaSkills">Gravar skills</button>
                    </div>
                </div>
            <form>
        </div>

    </div>
    
    <script>
    $(document).ready(function() {
        $('#skillMsg').hide();
        $('#skillMsg2').hide();

        $('#formSkills').on('submit', function(event) {
            event.preventDefault();
            var formSkills = new FormData();
            var files = $('#skill')[0].files;

            for (var i = 0; i < files.length; i++) {
                formSkills.append('skill[]', files[i]);
            }
            $.ajax({
                url: '../../src/Portfolio/Create/Skills.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formSkills,
                success: function(response) {
                    $('#skillMsg').show();
                    $('#skillMsg2').show();
                   // Limpar os campos do formulário
                    $('#skill').val('');
                },
                error: function(error) {
                    console.error('Erro ao enviar dados:', error);
                }
            });
        });
    });
</script>