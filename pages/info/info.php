<h5>Profile</h5>
<br>

<div class="row">
    <div class="col s12 center">
        <img src="" alt="foto" id="profile-pic" disabled hidden/>
    </div>
</div>
<h3 id="profileMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
</h3>
<a href="#modalProfile" id="modalProfileButton" class="modal-trigger">Who are you?</a>
<div id="modalProfile" class="modal modalBanner">
    
    <h3 id="profileMsg2" style="font-size: 15px; background-color: green; color: white; text-align:center;">
    </h3>
    
    <form id="formProfile">
        <input type="checkbox" id="profileOk" name="profileOk" value="false" hidden>
        <div class="row">
            <!-- table: info -->
            <div class="col s12 center">
                <input type="file" name="profile" id="profile" accept="image/*"><br>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" required>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" placeholder="Subtitle" required>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button id="saveProfile">Save</button>
            </div>
        </div>
    </form>
</div>
