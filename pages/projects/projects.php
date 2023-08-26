    <h5>Projetos</h5>
    <!-- table: projects -->
    <form action="src/Portfolio/Edit.php" METHOD="POST">
        <div class="row">
            <div class="col s12">
                <label for="projetos">Projetos</label>
                <input type="text" name="nome_projeto" placeholder="Nome do projeto" required>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="URL">URL</label>
                <input type="text" name="url" placeholder="URL do projeto">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <input type='submit' value="Atualizar" class="btn white black-text">
            </div>
        </div>
    </form>