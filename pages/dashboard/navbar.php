<nav style='position: fixed; top: 0; width: 100%; z-index: 100;'>
    <div class='nav-wrapper black'>
        <ul id='nav-mobile' class='left hide-on-med-and-down'>
            <li><a href='../../admin.php'>Home</a></li>
        </ul>
        <ul id='nav-mobile' class='left hide-on-med-and-down'>
            <li><a href='#templateList' class='modal-trigger'>Templates</a></li>
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

<div class='modal fade' id='templateList' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class="row">
        <div class="col s12">
        <h3 class='center'>Choose a template</h3>
        <select id="template" name="template">
            <?php
                foreach ($templates as $template) {
                    ?><option value="<?php echo $template['id']; ?>"><?php echo $template['name'];  ?></option><?php 
                }
            ?>
        </select>
    </div>
</div>

<script>
    M.AutoInit();

    $('.modal').modal();

    $('#templateList').click(function(e) {
        e.preventDefault(); 
        $('#myModal').modal('show');
    });
</script>