<h5 id="title">Projetos</h5>
<h3 id="projetoMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
</h3>
<a href="#modalProjects" class="modal-trigger">Adicione novo projeto</a>

<!-- table: projects -->
<br>
<div id="#modalProjects" class="modal modalProjects">
    <h3 id="projetoMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
    </h3>
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
</div>
<script>
    $(document).ready(function() {
        $('#projetoMsg').hide();
        $('#gravaProjeto').on('click', function(event) {
            event.preventDefault();
            var formProjects = new FormData();
            formProjects.append('inputPrint', $('#inputPrint')[0].files[0]); // Obtem o arquivo do input)
            formProjects.append('inputNomeProjeto', $('#inputNomeProjeto').val()); // Obtem o arquivo do input)
            formProjects.append('inputUrlProjeto', $('#inputUrlProjeto').val()); // Obtem o arquivo do input)
            var nomeProj = $('#inputNomeProjeto').val();

            $.ajax({
                url: '../../src/Portfolio/Create/Project.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formProjects,
                success: function(response) {
                    $('#projetoMsg').text("Projeto " + nomeProj + " salvo com sucesso");
                    $('#projetoMsg').show();
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