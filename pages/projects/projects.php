<h5>Projetos</h5>
<!-- table: projects -->
<form id="formProjects">
<div class="row">
    <div class="col s6 center">
        <a href="#modalProjects" class="modal-trigger">Adicionar Projeto</a>
    </div>
</div>
<div id="modalProjects" class="modal modalProjects">
    <div class="row">
        <div class="col s2 offset-s10">
            <a href="#!" class="modal-close btn-white black-text closeButton">Fechar</a>
        </div>
    </div>
    <div class="modal-content">
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
    </div>
</div>
</form>
<script>
    $('#formProjects').on('submit', function(){ event.preventDefault(); });

    $('#gravaProjeto').on('click', function() {

        if($('#inputPrint').length > 0 && $('#inputNomeProjeto').length > 0){
            var novaDiv = $('#form').clone();
            var formData = new FormData();

            // Adicione o arquivo de imagem ao FormData
            formData.append('file', file);

            const data = [{
                inputPrint: $('#inputPrint').val(),
                inputNomeProjeto: $('#inputNomeProjeto').val(),
                inputUrlProjeto: $('#inputUrlProjeto').val()
            }];

            $.ajax({
                url: '../../src/Portfolio/Create/Project.php', // Substitua com a URL do seu backend
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data), // Envie os dados como JSON
                success: function(response) {
                    console.log('Dados enviados com sucesso:', response);
                },
                error: function(error) {
                    console.error('Erro ao enviar dados:', error);
                }
            });
            novaDiv.find('input').val('');

            $('formProjects').append(novaDiv);
        
            }
        }
    );
  
    
</script>