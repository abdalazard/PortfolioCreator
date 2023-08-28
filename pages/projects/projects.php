<h5>Projetos</h5>
<!-- table: projects -->
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
            <div class="col s12 ">
                <label for="projetos">Projetos</label>
                <input type="text" name="nome_projeto" placeholder="Nome do projeto">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="URL">URL</label>
                <input type="text" name="url_projeto" placeholder="URL do projeto">
            </div>
        </div>

        <!-- Usar ajax para -->
        <div class="row">
            <div class="col s12">
                <input type="submit" value="Adicionar">
            </div>
        </div>
    </div>
</div>