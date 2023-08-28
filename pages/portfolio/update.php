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
    <title>Atualizar portfolio</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Inicio</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="create.php" class="modal-trigger">Novo</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="#">Mudar Layout(Em Breve)</a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black modal-trigger " href="../../src/Logout/Logout.php">Deslogar</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h3>Atualizar Portfolio</h3>

        <form action="/src/Portfolio/Update.php" METHOD="POST" enctype="multipart/form-data">
            <?php include '../info/info.php'; ?>
            <div class="row">
                <div class="col s6 center">
                    <input type='submit' value="Atualizar" class="btn white black-text">
                </div>
            </div>
        </form>
        <?php include '../skills/skills.php'; ?>
        <?php include '../projects/projects.php'; ?>
        <?php include '../others/others.php'; ?>
        <form action="/src/Portfolio/Update.php" METHOD="POST" enctype="multipart/form-data">
            <?php include '../social/social.php'; ?>
            <div class="row">
                <div class="col s6 center">
                    <input type='submit' value="Atualizar" class="btn white black-text">
                </div>
            </div>

        </form>

    </div>
</body>

</html>