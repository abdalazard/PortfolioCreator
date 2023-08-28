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
    <title>Criação de portfolio</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Inicio</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="update.php" class="modal-trigger">Atualizar</a></li>
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
        <h3>Criar novo Portfolio</h3>
        <form action="../../src/Portfolio/Create.php" METHOD="POST" enctype="multipart/form-data">

            <?php include '../info/info.php'; ?>

            <?php include '../skills/skills.php'; ?>

            <!-- Adicionar lista de projetos -->

            <?php include '../projects/projects.php'; ?>

            <?php include '../others/others.php'; ?>

            <?php include '../social/social.php'; ?>
            <div class="row">
                <div class="col s6 center">
                    <input type='submit' value="Visualizar novo portfolio" class="btn white black-text">
                </div>
            </div>

        </form>
    </div>

    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        M.AutoInit();
    </script>
</body>

</html>