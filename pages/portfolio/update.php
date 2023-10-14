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
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atualizar portfolio</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Inicio</a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black modal-trigger " href="../../src/Logout/Logout.php">Deslogar</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h3>Atualizar Portfolio</h3>

        <div id="boxProfile">
            <h5 id="profileForm"></h5>
            <div class="row">
                <div class="col s12 center">
                    <img src="" alt="foto" id="profile-pic" disabled hidden />
                    <p id="profileMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;"></p>

                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <input type="file" name="profilePic" id="profile" accept="image/*" style="margin-right: 80px;">
                    <input type="submit" id="profilePicUpdateButton" value="Gravar Titulo" disabled>

                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="text" id="profileTitle" placeholder="Titulo">
                    <input type="submit" id="profileTitleUpdateButton" value="Gravar Titulo" disabled>
                </div>

                <div class="col s6">
                    <input type="text" id="profileSubtitle" placeholder="Subtitulo">
                    <input type="submit" id="profileSubtitleUpdateButton" value="Gravar Titulo" disabled>
                </div>
            </div>
        </div>
        <br>
        <div id="boxSkills" class="boxSkills">
            <h5 id="skillsForm"></h5>
            <p id="skillsMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;"></p>
            <div class="row">
                <div class="col s12 center">
                    <div id="skillsGallery">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s9">
                    <input type="file" name="skill[]" id="skill" multiple accept="image/*">
                </div>
                <div class="col s3">
                    <input type="submit" id="updateSkills" disabled value="Atualizar">
                </div>
            </div>
            <br>
        </div>
        <br>
        <div id="boxProjects">
            <h5 id="projectsForm"></h5>
            <p id="projectSMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;"></p>
            <div class="row">
                <div class="col s12 center">
                    <div id="projectsGallery">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s9">
                </div>
                <div class="col s3">
                <input type="submit" id="updateProjects" disabled value="Atualizar">
                </div>
            </div>
            <br>
        </div>
        <div id="boxOthers">

        </div>
        <br>
        <div id="boxContacts">

        </div>

        <script>
            M.AutoInit();

            var statusId = <?php echo  $_GET['statusId']; ?>;

            $(document).ready(function() {
                $('#profileForm').text('Editar Profile');
                $('#skillsForm').text('Editar Skills');
                $('#projectsForm').text('Editar Projetos');

                $("#boxProfile").css({
                    "width": 600,
                    "padding": 10,
                    "background-color": "white", // Cor de fundo verde
                    "border": "1px solid green" // Borda fina verde
                });
                $("#boxSkills").css({
                    "width": 600,
                    "padding": 10,
                    "background-color": "white", // Cor de fundo verde
                    "border": "1px solid green" // Borda fina verde
                });

                $("#boxProjects").css({
                    "width": 600,
                    "padding": 10,
                    "background-color": "white", // Cor de fundo verde
                    "border": "1px solid green" // Borda fina verde
                });

                $("#footer-field").css({
                    "background-color": "black"
                })
                $("#footer-text").text("teste")

                checkForms();
                listSkills();
                listProjects()

                $('#profile').change(function() {
                    if (this.files && this.files[0]) {
                        $('#profilePicUpdateButton').prop('disabled', false);
                        $('#profilePicUpdateButton').css({
                            'padding': '10px 20px',
                            'background-color': '#007bff',
                            'color': '#fff',
                            'border': 'none',
                            'cursor': 'pointer',
                        });
                        
                    }
                });

                $('#profilePicUpdateButton').on('click', function(event) {
                    event.preventDefault();
                    var formProfile = new FormData();
                    console.log($('#profile')[0].files[0])
                    formProfile.append('profile', $('#profile')[0].files[0]); // Obtem o arquivo do input)
                    formProfile.append('action', 'updateProfilePic');

                    $.ajax({
                        url: '../../src/Portfolio/Update.php',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formProfile,
                        success: function(response) {
                            $('#profileMsg').text('');
                            $('#profileMsg').text('Imagem atualizada com sucesso!');
                            $('#profileMsg').show();
                            setTimeout(function() {
                                $('#profileMsg').fadeOut();
                            }, 1000);
                            checkForms()

                        },
                        error: function(error) {
                            console.error('Erro ao enviar dados:', error);
                        }
                    });

                });

                $('#profileTitle').change(function() {
                    $('#profileTitleUpdateButton').prop('disabled', false);
                    $('#profileTitleUpdateButton').css({
                        'padding': '10px 20px',
                        'background-color': '#007bff',
                        'color': '#fff',
                        'border': 'none',
                        'cursor': 'pointer',
                    });
                });

                $('#profileTitleUpdateButton').on('click', function() {
                    var formProfile = new FormData();
                    formProfile.append('data', $('#profileTitle').val());
                    formProfile.append('action', 'updateProfileTitle');

                    $.ajax({
                        url: '../../src/Portfolio/Update.php',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formProfile,
                        success: function(response) {
                            M.toast({
                                html: 'Titulo atualizado com sucesso'
                            })
                            $('#profileMsg').text('');
                            $('#profileMsg').text('Titulo atualizado com sucesso!');
                            $('#profileMsg').show();
                            setTimeout(function() {
                                $('#profileMsg').fadeOut();
                            }, 1000);

                            $('#profileTitle').val($('#profileTitle').val());
                            checkForms()

                        },
                        error: function(error) {
                            console.error('Erro ao enviar dados:', error);
                        }
                    });

                });

                $('#profileSubtitle').change(function() {
                    $('#profileSubtitleUpdateButton').prop('disabled', false);
                    $('#profileSubtitleUpdateButton').css({
                        'padding': '10px 20px',
                        'background-color': '#007bff',
                        'color': '#fff',
                        'border': 'none',
                        'cursor': 'pointer',
                    });
                });

                $('#profileSubtitleUpdateButton').on('click', function() {
                    var formProfile = new FormData();
                    formProfile.append('data', $('#profileSubtitle').val());
                    formProfile.append('action', 'updateProfileSubtitle');

                    $.ajax({
                        url: '../../src/Portfolio/Update.php',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formProfile,
                        success: function(response) {
                            M.toast({
                                html: 'Subtitulo atualizado com sucesso'
                            })
                            $('#profileMsg').text('');
                            $('#profileMsg').text('Subtitulo atualizado com sucesso!');
                            $('#profileMsg').show();
                            setTimeout(function() {
                                $('#profileMsg').fadeOut();
                            }, 1000);

                            $('#profileSubtitle').val($('#profileSubtitle').val());
                        },
                        error: function(error) {
                            console.error('Erro ao enviar dados:', error);
                        }
                    });

                });


                $('#skill').change(function() {
                    $('#updateSkills').prop('disabled', false);
                });

                $('#updateSkills').on('click', function(event) {
                    event.preventDefault();
                    var formSkills = new FormData();
                    var files = $('#skill')[0].files;
                    formSkills.append('action', 'updateSkills');

                    for (var i = 0; i < files.length; i++) {
                        formSkills.append('skill[]', files[i]);
                    }
                    $.ajax({
                        url: '../../src/Portfolio/Update.php',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formSkills,
                        success: function(response) {
                            M.toast({
                                html: 'Habilidades atualizadas com sucesso'
                            })
                            $('#skillsMsg').text('Habilidades atualizadas com sucesso')
                            $('#skillsMsg').show();
                            setTimeout(function() {
                                $('#skillsMsg').fadeOut();
                            }, 1000);

                            $('#skill').val('');
                            listSkills()
                        },
                        error: function(error) {
                            console.error('Erro ao enviar dados:', error);
                        }

                    });

                });

                function listSkills() {
                    $.ajax({
                        url: '../../src/Portfolio/Get.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            action: 'getSkills'
                        },
                        success: function(data) {
                            var theseSkills = data;
                            $("#skillsGallery").empty();

                            if (theseSkills.length >= 1) {
                                
                                for (var i = 0; i < theseSkills.length; i++) {
                                    var skillGallery = data[i].skill;
                                    var skillId = data[i].id;

                                    var imgElement = $('<img>');
                                    imgElement.attr('src', '../../' + skillGallery);
                                    imgElement.attr('id',  skillId);

                                    imgElement.css({
                                        'width': '110px',
                                        'height': '60px',
                                        'margin': 5,
                                        'cursor': 'pointer',
                                        "background-color": "white", // Cor de fundo verde
                                        "border": "1px solid green",
                                        "padding": 10,
                                        "border-radius": "20px",

                                    });
                                    imgElement.click(function() {
                                        var id = $(this).attr('id');
                                        var path = skillGallery;
                                        // Aqui você pode usar 'index' para identificar a imagem clicada
                                        showAlert()
                                        function showAlert() {
                                            var alertBox = document.createElement('div');
                                            alertBox.classList.add('custom-alert');
                                            
                                            alertBox.innerHTML = `
                                                <p>Você deseja mesmo deletar essa habilidade?</p>
                                                <img src="../../`+path+`" alt='Logotipo de linguagem' width='110px' height='60px' /> 
                                                <button class="red" id="confirmDelete">Sim</button>
                                                <button id="cancelDelete">Não</button>
                                            `;
                                            document.body.appendChild(alertBox);
                                            $(document).on('click', '#confirmDelete', function() {
                                                deleteSkill(id);
                                                alertBox.remove();
                                                $("#skillsGallery").empty();
                                                listSkills();
                                            });

                                            $(document).on('click', '#cancelDelete', function() {
                                                alertBox.remove();
                                            });
                                        }
                                        function deleteSkill(id) {
                                            $.ajax({
                                                url: '../../src/Portfolio/Delete.php',
                                                type: 'GET', 
                                                dataType: 'json',
                                                data: {
                                                    id: id,
                                                    path: path,
                                                    action: 'deleteSkill'
                                                },
                                                success: function(data) {
                                                    
                                                },
                                                error: function(error) {
                                                    console.error('Não se preocupe, só não existe nenhuma skill com este id. Erro:', error);
                                                }
                                            });    
                                        }                                   
                                    });

                                    $("#boxSkills").css({
                                        "width": 600,
                                        "padding": 10,
                                        "background-color": "white", // Cor de fundo verde
                                        "border": "1px solid green",
                                    });
                                    $("#skillsGallery").append(imgElement)
                                }

                            }

                        },
                        error: function(error) {
                            console.error(
                                'Não se preocupe, só não existe nenhuma skill com este id. Erro:',
                                error);
                        }
                    });
                }
                
                function listProjects() {
                    $.ajax({
                        url: '../../src/Portfolio/Get.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            action: 'getProjects'
                        },
                        success: function(data) {
                            var theseProjects = data;
                            $("#projectsList").empty();

                            if (theseProjects.length >= 1) {

                                for (var i = 0; i < theseProjects.length; i++) {
                                    var projectsGallery = data[i].print;
                                    var projectsName = data[i].nome_projeto;
                                    var projectsLink = data[i].url;


                                    var imgElement = $('<img>');
                                    imgElement.attr('src', '../../' + projectsGallery);
                                    imgElement.css({
                                        'max-width': '80px',
                                        'height': '40px',
                                        'margin': 5
                                    });

                                    $("#boxProjects").css({
                                        "width": 600,
                                        "padding": 10,
                                        "background-color": "white", // Cor de fundo verde
                                        "border": "1px solid green",
                                    });
                                    $("#projectsList").append(imgElement)

                                }

                            }

                        },
                        error: function(error) {
                            console.error(
                                'Não se preocupe, só não existe nenhuma skill com este id. Erro:',
                                error);
                        }
                    });
                }

                function checkForms() {

                    try {
                        $.ajax({
                            url: '../../src/Portfolio/Get.php',
                            type: 'GET',
                            dataType: 'json',
                            data: {
                                action: "getFormState"
                            },
                            success: function(data) {

                                userIdState = data.userId;
                                profileState = data.profile;
                                skillsState = data.skills;
                                projectsState = data.projects;
                                othersState = data.others;
                                contactsState = data.contacts;

                                if (profileState == true) {
                                    $.ajax({
                                        url: '../../src/Portfolio/Get.php',
                                        type: 'GET',
                                        dataType: 'json',
                                        data: {
                                            userId: userIdState,
                                            action: 'getProfile'
                                        },
                                        success: function(data) {
                                            var thisProfileId = data.id;
                                            var thisProfilePath = data.profile;
                                            var thisProfileTitle = data.titulo;
                                            var thisProfileSubtitle = data.subtitulo;

                                            if (thisProfileId >= 1) {

                                                $('#profile-pic').prop('disabled', false);
                                                $('#profile-pic').prop('src', '../../' +
                                                    thisProfilePath);
                                                $('#profile-pic').css({
                                                    'width': '50px',
                                                    'height': '50px',
                                                    'border-radius': '50%',
                                                    'object-fit': 'cover',
                                                    'display': 'block',
                                                    'margin': 'auto',
                                                    'border': '4px solid green'
                                                });
                                                $('#profile-pic').show();
                                                $('#profileTitle').val(thisProfileTitle);
                                                $('#profileSubtitle').val(
                                                    thisProfileSubtitle);

                                            }
                                        }
                                    });
                                }

                                if (skillsState == true) {

                                    $.ajax({
                                        url: '../../src/Portfolio/Get.php',
                                        type: 'GET',
                                        dataType: 'json',
                                        data: {
                                            userId: userIdState,
                                            action: 'getSkills'
                                        },
                                        success: function(data) {
                                            var theseSkills = data;
                                            if (theseSkills.length >= 1) {
                                                $('#skillMsg').text(
                                                    'Habilidades já presentes no banco de dados'
                                                )
                                                $('#skillMsg').show();
                                                $('#modalSkillsButton').hide();
                                            }

                                        },
                                        error: function(error) {
                                            console.error(
                                                'Não se preocupe, só não existe nenhuma skill com este id. Erro:',
                                                error);
                                        }
                                    });
                                }

                                if (projectsState == true) {

                                    $.ajax({
                                        url: '../../src/Portfolio/Get.php',
                                        type: 'GET',
                                        dataType: 'json',
                                        data: {
                                            userId: userIdState,
                                            action: 'getProjects'
                                        },
                                        success: function(data) {
                                            var theseProjects = data;
                                            if (theseProjects.length >= 1) {
                                                $('#projetoMsg').text(
                                                    'Projetos já presentes no banco de dados'
                                                )
                                                $('#projetoMsg').show();
                                                $('#modelProjectsButton').hide();

                                            }

                                        },
                                        error: function(error) {
                                            console.error(
                                                'Não se preocupe, só não existe nenhuma skill com este id. Erro:',
                                                error);
                                        }
                                    });
                                }
                                if (projectsState == true) {
                                    $.ajax({
                                        url: '../../src/Portfolio/Get.php',
                                        type: 'GET',
                                        dataType: 'json',
                                        data: {
                                            userId: userIdState,
                                            action: 'getOthers'
                                        },
                                        success: function(data) {
                                            var theseOthers = data;
                                            if (theseOthers.length >= 1) {
                                                $('#othersMsg').text(
                                                    'Eventos já presentes no banco de dados'
                                                )
                                                $('#othersMsg').show();
                                                $('#modalOthersButton').hide();
                                            }

                                        },
                                        error: function(error) {
                                            console.error(
                                                'Não se preocupe, só não existe nenhuma skill com este id. Erro:',
                                                error);
                                        }
                                    });
                                }
                                if (othersState == true) {
                                    $.ajax({
                                        url: '../../src/Portfolio/Get.php',
                                        type: 'GET',
                                        dataType: 'json',
                                        data: {
                                            userId: userIdState,
                                            action: 'getOthers'
                                        },
                                        success: function(data) {
                                            var theseOthers = data;
                                            if (theseOthers.length >= 1) {
                                                $('#othersMsg').text(
                                                    'Eventos já presentes no banco de dados'
                                                )
                                                $('#othersMsg').show();
                                                $('#modalOthersButton').hide();
                                            }

                                        },
                                        error: function(error) {
                                            console.error(
                                                'Não se preocupe, só não existe nenhuma skill com este id. Erro:',
                                                error);
                                        }
                                    });
                                }
                                if (contactsState == true) {
                                    $.ajax({
                                        url: '../../src/Portfolio/Get.php',
                                        type: 'GET',
                                        dataType: 'json',
                                        data: {
                                            userId: userIdState,
                                            action: 'getContacts'
                                        },
                                        success: function(data) {
                                            var theseContacts = data.id;
                                            if (theseContacts >= 1) {
                                                $('#socialMsg').text(
                                                    'Contatos já presentes no banco de dados'
                                                )
                                                $('#socialMsg').show();
                                                $('#modelSocialButton').hide();
                                            }

                                        },
                                        error: function(error) {
                                            console.error(
                                                'Não se preocupe, só não existe nenhuma skill com este id. Erro:',
                                                error);
                                        }
                                    });
                                }
                                if (profileState == true && skillsState == true && projectsState ==
                                    true && othersState == true && contactsState == true) {
                                    $('#createNewPortfolio').slideUp(1000, function() {
                                        $(this).hide();
                                    });

                                    $('#preview').removeClass('disabled');
                                    $('#preview').text("Visualize seu portfólio!");
                                    $('#preview').css({
                                        "background-color": "green"
                                    });
                                    $('#finished').append(
                                        '<h4 class="center">Já encontramos um portfolio seu gravado. Clique no botão verde para visualizar seu portfolio com o template padrão!</h4>'
                                    )
                                    $('#preview').click(function() {
                                        window.location.href = '../dashboard/visualization.php';
                                    });
                                }
                            },
                            error: function(error) {
                                console.log("Requisição do FormState deu errado! codigo: " + error)
                            }
                        });
                    } catch (erro) {
                        console.error(erro);
                    }
                };

                function setState(col, stt) {
                    var column = col;
                    var state = stt;
                    var formState = new FormData();
                    formState.append('column', column);
                    formState.append('state', state);
                    formState.append('action', "setState");

                    $.ajax({
                        url: '../../src/Portfolio/Create/FormState.php',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formState,
                        success: function(data) {
                            console.log("utils: setState atualizado")
                            checkForms()
                        },
                        error: function(error) {
                            console.log("setState do arquivo utils deu ruim!")
                        }
                    });
                }
            });
        </script>
</body>

</html>