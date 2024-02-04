<?php
include "../../db/Connection.php";
require_once '../../vendor/autoload.php';
include '../../auth/Authentication.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>DevFolio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../../styles2.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left ">
                <li><a href="../../../admin.php">Home</a></li>
            </ul>
            <ul id="nav-mobile" class="left ">
                <li><a id="new" class="modal-trigger">Create new</a></li>
            </ul>
            <!-- <ul id="nav-mobile" class="left" hidden>
                <li><a href="#">Change Layout(Soon)</a></li>
            </ul> -->
            <ul id="nav-mobile" class="left ">
                <li><a id="visu" href="/pages/dashboard/visualization/visualization.php">Visualizar Devfolio</a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black"
                        href="../../src/Logout/Logout.php">Logout</a>
                </li>
            </ul>
            <ul class="right">
                <li>
                    <a href="#modalSettings" class="modal-trigger" id="settings">
                        Settings
                    </a>
                </li>
            </ul>
            
        </div>
    </nav>

    <div class="container">
        <?php if (isset($_GET['msg'])) {
        ?>
        <h3 id="msg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
            <?php echo $_GET['msg']; ?>
        </h3>
        <?php } ?>
        <h1>Dashboard</h1>
        <div id="modalSettings" class="modal modalSettings">
            <h1>Settings</h1>
            <div class="row">
                    <div class="col s12">
                        <label for="username">Username</label>
                        <input type="text" class="username" id="username">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                    <label for="password">Password</label>
                    <input type="password" class="password" id="password">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                    <label for="password_confirmation">Password confirmation</label>
                    <input type="password" class="password_confirmation" id="password_confirmation">
                    </div>
                </div>
                <div class='row'>
                    <div class="col s12 center">
                        <button id="updateUser">Update user</button>
                    </div>
                </div>
               
        </div>
        <div>
            <h6>Hello, <?php echo $_SESSION['user']; ?>!</h6>
            <center>
                <script type="text/javascript" src="//widget.supercounters.com/ssl/online_t.js"></script><script type="text/javascript">sc_online_t(1684704,"Users Online","170ddb");</script><br><noscript><a href="https://www.supercounters.com/">supercounters.com</a></noscript>
            </center>
        </div>        
        <hr />
        <h3> My Devfolio's projects</h3>
        <?php if (isset($_GET['statusMsg'])) { ?>
            <h4 id="statusMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
                <?php echo $_GET['statusMsg']; ?>
            </h4>
        <?php } ?>
        <hr />
        <table id="portfolioList">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Profile</th>
                    <th>Title</th>
                    <th>Template</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                <td id="profileId"></td>
                <td class="left"><img src="" alt="foto" id="profilePic"></td>
                <td id="tituloProfile"></td>
                <td id="template"></td>
                <td>
                    <a id="editPortfolio"  class="modal-trigger">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                    </a>
                </td>
                <td id="deletePortfolio">
                    <a href="#modalDelete" id="modalDeletePortfolio"  class="modal-trigger">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </a>
                </td>
            </tbody>
        </table>
        <div id="modalDelete" class="modal center">
            <h1>Your portfolio will be erased.</h1>
            <h4>Are you  sure about that?</h4>
            <div id="confirmButton">

            </div>
        </div>
    </div>
<script>
var userId = '<?php echo  $_SESSION['id']; ?>';
var user = '<?php echo  $_SESSION['user']; ?>';
var status;
var statusId;

$(document).ready(function() {
    M.AutoInit();

    getStatus();
    getTemplateName();

    $('.modal').modal();

    $('#portfolioList').hide();

    $("#msg").addClass("logged");
    setTimeout(function() {
            $('#msg').fadeOut();
    }, 1000);

    $('#confirmButton').css({
        'padding': '10px 20px',
        'background-color': '#ef1047',
        'color': '#fff',
        'border': 'none',
        'cursor': 'pointer',
    }).text('Yes, I am!');

    function getStatus(){
        $.ajax({
            url: '../../src/Devfolio/Get.php',
            type: 'GET',
            dataType: 'json',
            data: {
                userId: userId,
                action: 'getStatus' 
            },
            success: function(data) {
                status = data.status;
                statusId = data.id;
                if(status == 0) {
                    $('#new').show();
                    $('#visu').hide();
                    setState()

                } 
                if(status == 1) {          
                    getList()
                    if($('#statusMsg').val() != null) {
                        setTimeout(function() {
                            $('#statusMsg').fadeOut();
                        }, 1000);                
                    }
                }
            },
            error: function(error) {
                console.log("getStatus com problema!")
            }
        });
    };

    function setState() {
        var state = new FormData();
        state.append('state', 0);
        state.append('action', "setState");

        $.ajax({
            url: '../../src/Devfolio/Create/State.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: state,
            success: function(data) {
                console.log("setState button worked well!")
            },
            error: function(error) {
                console.log("setState button didn't work well!")
            }
        });
    }

    $('#new').on('click', function(event){
        event.preventDefault();
        var formStatus = new FormData();
        formStatus.append('userId', userId); 
        formStatus.append('action', "setStatus");

        $.ajax({
            url: '../../src/Devfolio/Create/Status.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formStatus,
            success: function(data) {
                setState()
                location.href = "../portfolio/create.php"
            },
            error: function(error) {
                console.log("Create new's button didn't work well")
            }
        });

    });

    function getList() {
        $.ajax({
            url: '../../src/Devfolio/Get.php',
            type: 'GET', 
            dataType: 'json',
            data: {
                userId: userId,
                action: 'getProfile' 
            },
            success: function(data) {
                thisProfileId = data.id;
                thisProfilePath = data.profile;
                thisProfileTitle = data.title;

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
                    $('#visu').show();
                    $('#portfolioList').show();

                } 
            },
            error: function(error) {
                console.log("getProfile's trouble!")
            }
        });
    };
    $('#editPortfolio').on('click', function () {
        window.location.href = '../portfolio/update.php?statusId='+statusId
    });

    $('#confirmButton').on('click', function () {
        $.ajax({
            url: '../../src/Devfolio/Delete.php',
            type: 'GET', 
            dataType: 'json',
            data: {
                id: userId,
                action: 'deletePortfolio' 
            },
            success: function(data) {
                if (data.success) {
                    $('#modalDelete').hide();
                    window.location.reload(true);
                } else {
                    console.error('Erro ao excluir portfolio:', data.error);
                }
            },
            error: function(error) {
                console.log("deletePortfolio's trouble!")
                $('#modalDelete').hide();
                window.location.reload(true);
            }
        });
    });

    function getTemplateName() {
        $.ajax({
            url: '../../src/Devfolio/Get.php',
            type: 'GET', 
            dataType: 'json',
            data: {
                userId: userId,
                action: 'getTemplate' 
            },
            success: function(data) {
               templateName = data.name;
               $('#template').text(templateName);
            },
            error: function(error) {
                console.log("getTemplateName's trouble!")
            }
        });
    }

    $('#settings').on('click', function(e) {
        e.preventDefault();

        $('#modalSettings').css({
                "width": 300,
                "padding": 10,
                "background-color": "white", // Cor de fundo verde
                "border": "1px solid green", // Borda fina verde
                "margin-bottom": "50px"
            })
        $('#modalSettings').show();

        $.ajax({
            url: '../../src/Devfolio/Get.php',
            type: 'GET',
            dataType: 'json',
            data: {
                action: 'getUser' 
            },
            success: function(data) {
                $('#username').val(data.user);
            },
            error: function(error) {
                console.log("getUser's trouble!")
            }
        });
    });
});

$('#updateUser').on('click', function() {
    var username = $('#username').val();
    var password = $('#password').val();
    var password_confirmation = $('#password_confirmation').val();

    var user = new FormData();
    user.append('user', username);
    user.append('action', "updateUser");

    if (password != '') {       
        if (password != password_confirmation) {
            alert('As senhas não conferem');
            return;
        }
        user.append('password', password);
    }   

    $.ajax({
        url: '../../src/Devfolio/Update.php',
        type: 'POST',
        processData: false,
        contentType: false,
        data: user,
        success: function(data) {
            let url = new URL(window.location.href);
            url.searchParams.set('msg', "User data updated!");
            window.location.href = url.href;           
      },
        error: function(error) {
            console.log("updateUser didn't work well!")
        }
    });
    });

</script>
</body>

</html>