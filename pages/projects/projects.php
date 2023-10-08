<h5 id="title">Projetos</h5>
<h3 id="projetoMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
</h3>
<a href="#modalProjects" class="modal-trigger">Adicione novo projeto</a>

<!-- table: projects -->
<br>
<div id="modalProjects" class="modal modalProjects">
    <input type="text" value="true" name="ProjectOk" hidden>

    <h3 id="projetoMsg2" style="font-size: 15px; background-color: green; color: white; text-align:center;">
    </h3>
    <form id="formProjects">
        <input type="checkbox" id="projectOk" name="projectOk" value="false" hidden>

            <div class="row">
                <label>ScreenShot</label>
                <div class="col s12 center">
                    <input type="file" name="inputPrint" id="inputPrint" alt="Print da tela">
                </div>
            </div>
            <div class="row" id="form">
                <div class="col s12 center ">
                    <label for="projetos">Projetos</label>
                    <input type="text" name="inputNomeProjeto" id="inputNomeProjeto" placeholder="Nome do projeto">
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <label for="URL">URL</label>
                    <input type="text" name="inputUrlProjeto" id="inputUrlProjeto" placeholder="URL do projeto">
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <button type="submit" id="gravaProjeto">Gravar projeto</button>
                </div>
            </div>
    </form>
</div>
