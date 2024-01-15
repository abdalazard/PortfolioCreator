<?php include '../../auth/Authentication.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="../../styles2.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="utils.js"></script>
    <title>Create DevFolio</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Home</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down" >
                <li ><a href="../dashboard/visualization.php" id="preview"></a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black modal-trigger"
                        href="../../src/Logout/Logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="position: fixed; left: 0; top: 60%; transform: translateY(-50%);">
        <script type="text/javascript">
            atOptions = {
                'key' : '31624681408ac0ed416e8f139cebcec0',
                'format' : 'iframe',
                'height' : 600,
                'width' : 160,
                'params' : {}
            };
            document.write('<scr' + 'ipt type="text/javascript" src="//difficultywithhold.com/31624681408ac0ed416e8f139cebcec0/invoke.js"></scr' + 'ipt>');
        </script>
    </div>
    <div style="position: fixed; right: 0; top: 60%; transform: translateY(-50%);">
        <script type="text/javascript">
            atOptions = {
                'key' : '31624681408ac0ed416e8f139cebcec0',
                'format' : 'iframe',
                'height' : 600,
                'width' : 160,
                'params' : {}
            };
            document.write('<scr' + 'ipt type="text/javascript" src="//difficultywithhold.com/31624681408ac0ed416e8f139cebcec0/invoke.js"></scr' + 'ipt>');
        </script>
    </div>
    <div class="container">
        <?php if(isset($_GET['msg'])) { echo "<p class='red' id='msg' name='msg'>".$_GET['msg']."</p>";} ?>
        <div id="createNewPortfolio">
            <h3>Create a new Devfolio</h3>

            <?php include '../info/info.php'; ?>

            <?php include '../skills/skills.php'; ?>

            <!-- Adicionar lista de projetos -->

            <?php include '../projects/projects.php'; ?>

            <?php include '../others/others.php'; ?>

            <?php include '../contacts/contacts.php'; ?>
        </div>

        <div id="finished"></div>

        <br>
    </div>
    </body>

    <script>
        M.AutoInit();
        var userId = '<?php echo  $_SESSION['id']; ?>';
        var user = '<?php echo  $_SESSION['user']; ?>';
    </script>
    <div class="center" style="margin-top: 30px; margin-right: 500px;">
        <script type="text/javascript">
            atOptions = {
                'key' : '64c9f95ee05a7716b801515f91ab0be6',
                'format' : 'iframe',
                'height' : 60,
                'width' : 468,
                'params' : {}
            };
            document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/64c9f95ee05a7716b801515f91ab0be6/invoke.js"></scr' + 'ipt>');
        </script>
    </div>   