<?php
include '../../db/Connection.php';
include '../../auth/Authentication.php'; ?>
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
    <title>Login</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Inicio</a></li>
            </ul>
            <?php include '../../src/Portfolio/Portfolio.php';
            $portfolio = new Portfolio;

            if ($portfolio->moreThanOne($_SESSION['id']) == true) {

                ?>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../portfolio/update.php" class="modal-trigger">Atualizar</a></li>
            </ul>
            <?php
            // header("location: ../../pages/dashboard/dashboard.php?msg=" . $msg);
            } else { ?>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../portfolio/create.php" class="modal-trigger">Criar novo</a></li>
            </ul>
            <?php } ?>

            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="#">Mudar Layout(Em Breve)</a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black modal-trigger "
                        href="../../src/Logout/Logout.php">Deslogar</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php if (isset($_GET['msg'])) {
        ?>
        <h3 id="msg" style="font-size: 15px; background-color: red; color: white; text-align:center;">
            <?php echo $_GET['msg']; ?>
        </h3>
        <?php } ?>
        <h1>Dashboard</h1>
        <div>
            <h6>Olá, <?php echo $_SESSION['user']; ?></h6>
        </div>

        <h2>Meu portfólio atual</h2>
        <hr />
        <p>Baixe o portfolio do banco aqui</p>

    </div>
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    M.AutoInit();
    $("#msg").addClass("logged");
    $(document).ready(function() {
        setTimeout(function() {
            $('#msg').fadeOut();
        }, 1000);
    });
    </script>
</body>

</html>