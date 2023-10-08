<h5>Skills</h5>

<div class="col s6">
    <h3 id="skillMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
        Habilidades salvas com sucesso
    </h3>
    <a href="#modalSkills" class="modal-trigger">Adicione mais de uma logo</a>
</div>
<br>
<!-- table: projects -->
<div id="modalSkills" class="modal modalSkills">
    <input type="checkbox" id="skillsOk" name="skillsOk" value="false" hidden>

    <div class="row">
        <div class="col s2 offset-s10">
            <a href="#!" class="modal-close btn-white black-text closeButton" id="closeButton">Fechar</a>
        </div>
    </div>
    <div class="row">
        <div class="col s6 center">
            <h3 id="skillMsg2" style="font-size: 15px; background-color: green; color: white; text-align:center;">
                Habilidades salvas com sucesso
            </h3>
        </div>
    </div>
    <div class="modal-content">
        <form id="formSkills" enctype="multipart/form-data">
            <div class="row">
            <label for="skill">Habilidade(Adicione várias imagens renderizada das stacks)</label>
                <div class="col s12 ">
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

