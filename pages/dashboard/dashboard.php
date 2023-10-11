<?php
include "../../db/Connection.php";
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
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Login</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Inicio</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a id="new" class="modal-trigger">Criar novo</a></li>
            </ul>
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

        <hr />
        <h3>Lista de projetos de portfólio</h3>
        <table id="portfolioList">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Editar</th>
                    <th>Excluir</th>

                </tr>
            </thead>
            <tbody>
                <td id="profileId"></td>
                <td class="left"><img src="" alt="foto" id="profilePic"></td>
                <td id="tituloProfile"></td>
            </tbody>
        </table>
    </div>

<script>
M.AutoInit();
var userId = '<?php echo  $_SESSION['id']; ?>';
var user = '<?php echo  $_SESSION['user']; ?>';
var status;
var statusId;

$(document).ready(function() {
getStatus();

$('#portfolioList').hide();

$("#msg").addClass("logged");
setTimeout(function() {
        $('#msg').fadeOut();
    }, 1000);


function getStatus(){
    $.ajax({
        url: '../../src/Portfolio/Get.php',
        type: 'GET',
        dataType: 'json',
        data: {
            userId: userId,
            action: 'getStatus' 
        },
        success: function(data) {
            status = data.status;
            statusId = data.id;
            console.log(data)
            if(status == 0) {
                $('#new').show();
                setState()

            } 
            if(status == 1) {
                getList()
            }
        },
        error: function(error) {
            console.log("getStatus com problema!")
        }
    });
};

function setState() {
    var formState = new FormData();
    formState.append('state', status);
    formState.append('action', "setState");

    $.ajax({
        url: '../../src/Portfolio/Create/FormState.php',
        type: 'POST',
        processData: false,
        contentType: false,
        data: formState,
        success: function(data) {
            console.log("setState ok")
        },
        error: function(error) {
            console.log("setState do botão new deu errado!")
        }
    });
}

$('#new').on('click', function(event){
    event.preventDefault();
    var formStatus = new FormData();
    formStatus.append('userId', userId); 
    formStatus.append('action', "setStatus");

    $.ajax({
            url: '../../src/Portfolio/Create/Status.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formStatus,
            success: function(data) {
                setState()
                location.href = "../portfolio/create.php"
                console.log("aqui")
            },
            error: function(error) {
                console.log("botão new deu errado!")
            }
        });

    });

function getList() {
        $.ajax({
            url: '../../src/Portfolio/Get.php',
            type: 'GET', 
            dataType: 'json',
            data: {
                userId: userId,
                action: 'getProfile' 
            },
            success: function(data) {
                thisProfileId = data.id;
                thisProfilePath = data.profile;
                thisProfileTitle = data.titulo;

                if(thisProfileId >= 1) {
                    $('#profileId').text(thisProfileId);
                    $('#profilePic').css({
                        'width': '50px',
                        'height': '50px',
                        'border-radius': '50%',
                        'object-fit': 'cover',
                        'display': 'block',
                        'margin': 'auto',
                        'border': '2px solid #ffffff'
                    });                    
                    thisProfilePath = '../../'+thisProfilePath;
                    $('#profilePic').prop('src', thisProfilePath);

                    $('#tituloProfile').text(thisProfileTitle);
                    $('#new').hide();
                    $('#portfolioList').show();

                } 
            },
            error: function(error) {
                console.log("getProfile com problema!")
            }
        });
    };
});
</script>

</body>

</html>