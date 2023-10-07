<h5>Palestras, workshops, cursos e certificações</h5>
<!-- others -->
<h3 id="othersMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
</h3>
<div class="row">
    <div class="col s6 center">
        <a href="#modalBanner" class="modal-trigger">Adicionar banners de palestras, workshops e eventos.</a>
    </div>
</div>
<div id="modalBanner" class="modal modalBanner">
    <div class="row">
        <div class="col s2 offset-s10">
            <a href="#!" class="modal-close btn-white black-text closeButton">Fechar</a>
        </div>
    </div>
    <div class="modal-content">
        <form id="formOthers">
            <div class="row">
                <div class="col s12 ">
                    <label for="url_banner">Titulo do evento/artigo/palestra/workshop/curso</label>
                    <input type="text" name="titulo_others" id="titulo_others">
                </div>
            </div>
            <div class="row">
                <div class="col s12 ">
                    <label for="banner">Flyer/banner(Adicione os banners, fotos e anúncios)</label>
                    <input type="file" name="others" id="others">
                </div>
            </div>
            <div class="row">
                <div class="col s12 ">
                    <label for="url_banner">URL do evento</label>
                    <input type="text" name="url_others" id="url_others">
                </div>
            </div>
            <div class="row">
                <div class="col s12 ">
                <button type="submit" id="gravaOthers">Gravar skills</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#projetoMsg').hide();
    $('#gravaOthers').on('click', function(event) {
        event.preventDefault();
        var formOthers = new FormData();
        formOthers.append('titulo', $('#titulo_others').val()); // Obtem o arquivo do input)
        formOthers.append('others', $('#others')[0].files[0]); // Obtem o arquivo do input)
        formOthers.append('url_others', $('#url_others').val()); // Obtem o arquivo do input)
        var nomePub = $('#titulo_others').val();

        $.ajax({
            url: '../../src/Portfolio/Create/Others.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formOthers,
            success: function(response) {
                $('#othersMsg').text("O link do evento " + nomePub + " salvo com sucesso");
                $('#othersMsg').show();
                // Limpar os campos do formulário
                $('#titulo_others').val('');
                $('#others').val('');
                $('#url_others').val('');
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });
});
</script>