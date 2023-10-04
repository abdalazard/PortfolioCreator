<h5>Projetos</h5>
<!-- table: projects -->
<br>
<form id="formProjects">

        <div class="row">
            <div class="col s12">
                <label>ScreenShot</label>
                <input type="file" name="inputPrint" id="inputPrint" alt="Print da tela">
            </div>
        </div>
        <div class="row" id="form">
            <div class="col s12 ">
                <label for="projetos">Projetos</label>
                <input type="text" name="inputNomeProjeto" id="inputNomeProjeto" placeholder="Nome do projeto">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="URL">URL</label>
                <input type="text" name="inputUrlProjeto" id="inputUrlProjeto" placeholder="URL do projeto">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button type="submit" id="gravaProjeto">Gravar projeto</button>
            </div>
        </div>
</form>
<script>
    $(document).ready(function() {
        $('#formProjects').on('submit', function(event) {
            event.preventDefault();
            
            var formData = new FormData(this);
            
            $.ajax({
                url: '../../src/Portfolio/Create/Project.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    alert('Projeto salvo com sucesso!');
                
                    // Limpar os campos do formulário
                    $('#inputPrint').val('');
                    $('#inputNomeProjeto').val('');
                    $('#inputUrlProjeto').val('');
                },
                error: function(error) {
                    console.error('Erro ao enviar dados:', error);
                }
            });
        });
    });
</script>