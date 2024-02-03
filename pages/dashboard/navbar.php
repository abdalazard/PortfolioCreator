<nav style='position: fixed; top: 0; width: 100%; z-index: 100;'>
    <div class='nav-wrapper black'>
        <ul id='nav-mobile' class='left'>
            <li><a href='../../../admin.php'>Home</a></li>
        </ul>
        <ul id='nav-mobile' class='left'>
            <li><a href='#modal' class='modal-trigger'>Templates</a></li>
        </ul>
        <ul class='right'>
            <li><a class='waves-effect waves-light btn green modal-trigger' href='#' id='publish'>Publish</a>
            </li>
        </ul>
        <ul class='right'>
            <li><a class='waves-effect waves-light btn black modal-trigger' id='backButton' href='#'>Go back</a>
            </li>
        </ul>
    </div>
</nav>

<div class='modal fade' id='modal' tabindex='-1' role='dialog' aria-hidden='true'>
    <div class="row">
        <div class="col s12">
            <h3 class="center" style="margin-top:20px;">Choose a template</h3>
        </div>
    </div>
    <div class="templateList">
        <div class="row">
        <?php if ($templates) { ?>
            <div class="col s9">
                <select id="template" class="template" name="template">
                    <option value="" disabled selected>Choose your option</option>
                    <?php
                        foreach ($templates as $temp) { ?>
                            <option value="<?php echo $temp['id']; ?>"><?php echo $temp['name'];  ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col s3">
                <a href="#" class="waves-effect waves-light black btn" id="chooseTemplate">Choose</a>
            </div>
            <?php } else {
                echo "<h4 class='center'>You don't have any template registered, so you're using the default template.</h4>";
                echo "<h6 class='center'>You can add a new template in the admin page <a href='#'>here</a></h6>";
            }?>
        </div>
    </div>    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
    })
</script>