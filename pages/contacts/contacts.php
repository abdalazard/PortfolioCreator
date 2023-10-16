<h5>How to find me</h5>
<h3 id="contactMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
</h3>
<a href="#modalContact" id="modalContactButton" class="modal-trigger">Add your contacts</a>

<!-- table: socials -->
<div id="modalContact" class="modal modalContact">
    <h3 id="contactMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
    </h3>
    <form id="formContact">
        <input type="checkbox" id="contactOk" name="contactOk" value="false" hidden>

        <div class="row">
            <div class="col s12">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Add your email address">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="github">Github</label>
                <input type="text" name="github" id="github" placeholder="https://github.com/[complete]">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="linkedin">Linkedin</label>
                <input type="text" name="linkedin" id="linkedin" placeholder="https://linkedin/in/[complete]">
            </div>
        </div>
        <div class="row">
            <div class="col s12 center">
                <button id="saveContact">Save</button>
            </div>
        </div>
    </form>
</div>
