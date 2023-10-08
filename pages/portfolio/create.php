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
    <title>Criação de portfolio</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Inicio</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down" >
                <li ><a href="../dashboard/visualization.php" id="preview" disabled></a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black modal-trigger"
                        href="../../src/Logout/Logout.php">Deslogar</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php if(isset($_GET['msg'])) { echo "<p class='red' id='msg' name='msg'>".$_GET['msg']."</p>";} ?>
        <div id="createNewPortfolio">
            <h3>Criar novo Portfolio</h3>

            <?php include '../info/info.php'; ?>

            <?php include '../skills/skills.php'; ?>

            <!-- Adicionar lista de projetos -->

            <?php include '../projects/projects.php'; ?>

            <?php include '../others/others.php'; ?>

            <?php include '../social/social.php'; ?>
        </div>
        <!-- <div class="row">
            <div class="col s12 center">
                <input type="button" value="Verificar portfolio" id="verifica">

            </div>
        </div> -->
        <br>
    </div>
    </body>

    <script>
        M.AutoInit();
        var userId = '<?php echo  $_SESSION['id']; ?>';
        var user = '<?php echo  $_SESSION['user']; ?>';
    </script>
</html>
