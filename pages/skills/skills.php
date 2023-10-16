<h5>Skills</h5>

<div class="col s12">
    <h3 id="skillMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
    </h3>
    <a href="#modalSkills" id="modalSkillsButton" class="modal-trigger">Add more than one image</a>
</div>
<br>
<!-- table: projects -->
<div id="modalSkills" class="modal modalSkills">

    <div class="row">
        <div class="col s2 offset-s10">
            <a href="#!" class="modal-close btn-white black-text closeButton" id="closeButton">Close</a>
        </div>
    </div>
    <h3 id="skillMsg2" style="font-size: 15px; background-color: green; color: white; text-align:center;">
    </h3>
    <div class="modal-content">
        <form id="formSkills" enctype="multipart/form-data">
        <input type="checkbox" id="skillsOk" name="skillsOk" value="false" hidden>

            <div class="row">
            <label for="skill">Stacks</label>
                <div class="col s12">
                    <input type="file" name="skill[]"  id="skill" multiple accept="image/*">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col s12 center">
                <button id="saveSkills">Save skills</button>
                </div>
            </div>
        <form>
    </div>
</div>


