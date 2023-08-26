    <h5>Profile</h5>
    <form action="/src/Portfolio/Update/Updating.php" METHOD="POST" enctype="multipart/form-data">

        <input type="text" class="type" value="profile" hidden />
        <div class="row">
            <!-- table: info -->
            <div class="col s12">
                <label for="foto">Foto</label>
                <input type="file" name="foto" accept=".png, .jpeg, .jpg, .pdf"><br>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" placeholder="Título" required>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="subtitulo">Subtitulo</label>
                <input type="text" name="subtitulo" placeholder="Subtitulo(tecnologias)" required>
            </div>
        </div>

        </div>

        <div class="row">
            <div class="col s12">
                <input type='submit' value="Atualizar" class="btn white black-text">
            </div>
        </div>
    </form>