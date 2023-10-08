<h5>Profile</h5>
<br>

<div class="row">
    <div class="col s12 center">
        <img src="" alt="foto" id="profile-pic" disabled hidden/>
    </div>
</div>
<h3 id="profileMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
</h3>
<a href="#modalProfile" id="modalProfileButton" class="modal-trigger">Adicione seus dados pessoais</a>
<div id="modalProfile" class="modal modalBanner">
    
    <h3 id="profileMsg2" style="font-size: 15px; background-color: green; color: white; text-align:center;">
    </h3>
    
    <form id="formProfile">
        <div class="row">
            <!-- table: info -->
            <div class="col s12 center">
                <input type="file" name="profile" id="profile" accept="image/*"><br>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="Título" required>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="subtitulo">Subtitulo</label>
                <input type="text" name="subtitulo" id="subtitulo" placeholder="Subtitulo(tecnologias)" required>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <input type="submit" value="Salvar" id="gravaProfile">
            </div>
        </div>
    </form>
</div>
