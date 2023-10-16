<h5 id="title">Project</h5>
<h3 id="projectMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
</h3>
<a href="#modalProjects" id="modalProjectsButton" class="modal-trigger">Add a new project</a>

<!-- table: projects -->
<br>
<div id="modalProjects" class="modal modalProjects">

    <h3 id="projetoMsg2" style="font-size: 15px; background-color: green; color: white; text-align:center;">
    </h3>
    <form id="formProjects">
        <!-- <input type="type" id="projectOk" name="projectOk" value="false" hidden> -->
            <div class="row">
                <div class="col s12">
                    <label>ScreenShot's project</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <input type="file" name="screenShotInput" id="screenShotInput" alt="Take a screenshot of your project home page">
                </div>
            </div>
            <div class="row" id="form">
                <div class="col s12 ">
                    <label for="projetos">Project name</label>
                    <input type="text" name="projectNameInput" id="projectNameInput" placeholder="Project name">
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="URL">Link</label>
                    <input type="text" name="projectLinkInput" id="projectLinkInput" placeholder="Post the URL project">
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <button type="submit" id="saveProject">Save project</button>
                </div>
            </div>
    </form>
</div>
