<?php include '../../auth/Authentication.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="../../styles2.css" />
    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Creator</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left ">
                <li><a href="../../admin.php">Home</a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black modal-trigger " href="../../src/Logout/Logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>    
    <div class="container">
        <h3>Update your Devfolio</h3>

        <div id="boxProfile">
            <h5 id="profileForm"></h5>
            <div class="row">
                <div class="col s12 center">
                    <img src="" alt="Me" id="profile-pic" disabled hidden />
                    <p id="profileMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;"></p>

                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <input type="file" name="profilePic" id="profile" accept="image/*" style="margin-right: 80px;">
                    <input type="submit" id="profilePicUpdateButton" value="Save profile" disabled>

                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="text" id="profileTitle" placeholder="Title">
                    <input type="submit" id="profileTitleUpdateButton" value="Save title" disabled>
                </div>

                <div class="col s6">
                    <input type="text" id="profileSubtitle" placeholder="Subtitle">
                    <input type="submit" id="profileSubtitleUpdateButton" value="Save subtitle" disabled>
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
            </div>
            <div class="row">
                <div class="col s3">
                    <input type="submit" id="updateSkills" disabled value="Update">
                </div>
            </div>
            <br>
        </div>
        <br>
        <div id="boxProjects" class="boxProjects">
            <div class="row">
                <h5 id="projectsForm"></h5>
                <a href="#modalProject" id="newProject" class="modal-trigger"></a>
            </div>
            <p id="projectMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;"></p>
            <div class="row">
                <div class="col s12 center">
                    <div id="projectIndividual">
                        <div id="projectsGallery" name="projectsGallery">
                        </div>
                    </div>
                </div>
            </div>

            <div id="modalProject" class="modal modalProject">

                <h3 id="projectsMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;"></h3>
                <div class="row">
                    <div class="col s12">
                        <input type="file" name="screenshot" id="screenshot" accept="image/*" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <input type="text" name="project_name" id="project_name" placeholder="Add the project's title" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <input type="text" name="new_project_link" id="new_project_link" placeholder="Add the project's link" required>
                    </div>
                </div>
                <div class='row'>
                    <div class="col s12 center">
                        <button id="updateProjectList" disabled>Update project</button>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <br>
        <div id="boxOthers">
            <div class="row">
                <h5 id="othersForm"></h5>
                <a href="#modalOthers" id="newOthers" class="modal-trigger"></a>
            </div>
            <p id="othersMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;"></p>
            <div class="row">
                <div class="col s12 center">
                    <div id="othersIndividual">
                        <div id="othersGallery" name="othersGallery">
                        </div>
                    </div>
                </div>
            </div>

            <div id="modalOthers" class="modal modalOthers">
                <h3 id="othersMsg2" style="font-size: 15px; background-color: green; color: white; text-align:center;"></h3>
                <div class="row">
                    <div class="col s12">
                        <input type="file" name="others_banner" id="others_banner" accept="image/*" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <input type="text" name="others_name" id="others_name" placeholder="Add the event's title" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <input type="text" name="others_link" id="others_link" placeholder="Add the event's link" required>
                    </div>
                </div>
                <div class='row'>
                    <div class="col s12 center">
                        <button id="updateOthersList">Update your event/article</button>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <br>
        <div id="boxContacts">
            <h5 id="contactForm"></h5>
            <div class="row">
            <div class="col s4">
                    <input type="text" id="emailUser" placeholder="E-mail User">
                    <input type="submit" id="emailUpdateButton" value="Save E-mail" disabled>
                </div>

                <div class="col s4">
                    <input type="text" id="githubUser" placeholder="Github User">
                    <input type="submit" id="githubUpdateButton" value="Save Github" disabled>
                </div>

                <div class="col s4">
                    <input type="text" id="linkedinUser" placeholder="Linkedin User">
                    <input type="submit" id="linkedinUpdateButton" value="Save Linkedin" disabled>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        M.AutoInit();

        var statusId = <?php echo  $_GET['statusId']; ?>;

        $(document).ready(function() {
            $('#profileForm').text('Edit Profile');
            $('#skillsForm').text('Edit Skills');
            $('#projectsForm').text('Edit Project');
            $('#othersForm').text('Edit Event');
            $('#contactForm').text('Edit Contact');

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

            $("#boxOthers").css({
                "width": 600,
                "padding": 10,
                "background-color": "white", // Cor de fundo verde
                "border": "1px solid green" // Borda fina verde
            });

            $('#modalOthers').css({
                "width": 350,
                "height": 300,
                "padding": 10,
                "background-color": "white", // Cor de fundo verde
                "border": "1px solid green" // Borda fina verde
            })

            $('#modalProject').css({
                "width": 350,
                "height": 300,
                "padding": 10,
                "background-color": "white", // Cor de fundo verde
                "border": "1px solid green" // Borda fina verde
            })

            $('#boxContacts').css({
                "width": 600,
                "padding": 10,
                "background-color": "white", // Cor de fundo verde
                "border": "1px solid green", // Borda fina verde
                "margin-bottom": "50px"
            })

            $('#newProject').text("Publish new project");
            $('#newOthers').text("Publish new event");

            $("#footer-field").css({
                "background-color": "black"
            });
            $("#footer-text").text("teste");

            showProfile();
            listSkills();
            listProjects();
            listOthers();
            showContacts();

            //Update scripts

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

            $('#screenshot').change(function() {
                if ($('#screenshot')[0].files[0]) {

                    $('#updateProjectList').prop('disabled', false);
                }
            });

            $('#profilePicUpdateButton').on('click', function(event) {
                event.preventDefault();
                var formProfile = new FormData();
                formProfile.append('profile', $('#profile')[0].files[0]); // Obtem o arquivo do input)
                formProfile.append('action', 'updateProfilePic');

                $.ajax({
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formProfile,
                    success: function(response) {
                        $('#profileMsg').text('');
                        $('#profileMsg').text('Profile updated successfully!');
                        $('#profileMsg').show();
                        setTimeout(function() {
                            $('#profileMsg').fadeOut();
                        }, 1000);
                        showProfile()

                    },
                    error: function(error) {
                        console.error('ProfilePicUpdateButton go worng:', error);
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
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formProfile,
                    success: function(response) {
                        M.toast({
                            html: 'Title updated successfully'
                        })
                        $('#profileMsg').text('');
                        $('#profileMsg').text('Title updated successfully');
                        $('#profileMsg').show();
                        setTimeout(function() {
                            $('#profileMsg').fadeOut();
                        }, 1000);

                        $('#profileTitle').val($('#profileTitle').val());
                        showProfile()

                    },
                    error: function(error) {
                        console.error('profileTitleUpdateButton go wrong:', error);
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
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formProfile,
                    success: function(response) {
                        M.toast({
                            html: 'Subtitle updated successfully!'
                        })
                        $('#profileMsg').text('');
                        $('#profileMsg').text('Subtitle updated successfully!');
                        $('#profileMsg').show();
                        setTimeout(function() {
                            $('#profileMsg').fadeOut();
                        }, 1000);

                        $('#profileSubtitle').val($('#profileSubtitle').val());
                    },
                    error: function(error) {
                        console.error('profileSubtitleUpdateButton go wrong:', error);
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
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formSkills,
                    success: function(response) {
                        M.toast({
                            html: 'Skill updated successfully!'
                        })
                        $('#skillsMsg').text('Skill updated successfully!')
                        $('#skillsMsg').show();
                        setTimeout(function() {
                            $('#skillsMsg').fadeOut();
                        }, 1000);

                        $('#skill').val('');
                        listSkills()
                    },
                    error: function(error) {
                        console.error('updateSkill go wrong:', error);
                    }

                });

            });

            $('#updateProjectList').on('click', function() {
                event.preventDefault();
                var formProject = new FormData();
                formProject.append('screenshot', $('#screenshot')[0].files[0]);
                formProject.append('project_name', $('#project_name').val());
                formProject.append('project_link', $('#new_project_link').val());
                formProject.append('action', 'updateProject');

                $.ajax({
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formProject,
                    success: function(response) {
                        M.toast({
                            html: 'Project updated successfully!'
                        })
                        $('#projectMsg').text('Project updated successfully!')
                        $('#projectMsg').show();
                        setTimeout(function() {
                            $('#projectMsg').fadeOut();
                        }, 1000);

                        $('#project_name').val('');
                        $('#project_link').val('');
                        listProjects();
                    },
                    error: function(error) {
                        console.error('updateProjectList go wrong:', error);
                    }

                });

            });

            $('#updateOthersList').on('click', function() {
                event.preventDefault();
                var formOthers = new FormData();
                formOthers.append('banner', $('#others_banner')[0].files[0]);
                formOthers.append('others_title', $('#others_name').val());
                formOthers.append('others_link', $('#others_link').val());
                formOthers.append('action', 'updateOthers');

                $.ajax({
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formOthers,
                    success: function(response) {
                        M.toast({
                            html: 'Event updated successfully!'
                        })
                        $('#othersMsg').text('Event updated successfully!')
                        $('#othersMsg').show();
                        setTimeout(function() {
                            $('#othersMsg').fadeOut();
                        }, 1000);

                        $('#others_name').val('');
                        $('#others_link').val('');
                        listOthers()

                    },
                    error: function(error) {
                        console.error('updateOthersList go wrong:', error);
                    }

                });

            });

            //Criar botão de atualização de contatos Github e linkedin

            $('#emailUser').change(function() {
                $('#emailUpdateButton').prop('disabled', false);
                $('#emailUpdateButton').css({
                    'padding': '10px 20px',
                    'background-color': '#007bff',
                    'color': '#fff',
                    'border': 'none',
                    'cursor': 'pointer',
                });
            });

            $('#githubUser').change(function() {
                $('#githubUpdateButton').prop('disabled', false);
                $('#githubUpdateButton').css({
                    'padding': '10px 20px',
                    'background-color': '#007bff',
                    'color': '#fff',
                    'border': 'none',
                    'cursor': 'pointer',
                });
            });

            $('#linkedinUser').change(function() {
                $('#linkedinUpdateButton').prop('disabled', false);
                $('#linkedinUpdateButton').css({
                    'padding': '10px 20px',
                    'background-color': '#007bff',
                    'color': '#fff',
                    'border': 'none',
                    'cursor': 'pointer',
                });
            });

            $('#emailUpdateButton').on('click', function() {
                var formContacts = new FormData();
                formContacts.append('data', $('#emailUser').val());
                formContacts.append('action', 'updateEmail');

                $.ajax({
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formContacts,
                    success: function(response) {
                        M.toast({
                            html: 'E-mail updated successfully!'
                        })
                        $('#contactMsg').text('E-mail updated successfully!')
                        $('#contactMsg').show();
                        setTimeout(function() {
                            $('#contactMsg').fadeOut();
                        }, 1000);

                        $('#emailUser').val($('#emailUser').val());
                    },
                    error: function(error) {
                        console.error('emailUpdateButton go wrong:', error);
                    }
                });
            });

            $('#githubUpdateButton').on('click', function() {
                var formContacts = new FormData();
                formContacts.append('data', $('#githubUser').val());
                formContacts.append('action', 'updateGithub');

                $.ajax({
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formContacts,
                    success: function(response) {
                        M.toast({
                            html: 'Github updated successfully!'
                        })
                        $('#contactMsg').text('Github updated successfully!')
                        $('#contactMsg').show();
                        setTimeout(function() {
                            $('#contactMsg').fadeOut();
                        }, 1000);

                        $('#githubUser').val($('#githubUser').val());
                    },
                    error: function(error) {
                        console.error('githubUpdateButton go wrong:', error);
                    }
                });
            });

            $('#linkedinUpdateButton').on('click', function() {
                var formContacts = new FormData();
                formContacts.append('data', $('#linkedinUser').val());
                formContacts.append('action', 'updateLinkedin');

                $.ajax({
                    url: '../../src/Devfolio/Update.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formContacts,
                    success: function(response) {
                        M.toast({
                            html: 'Linkedin updated successfully!'
                        })
                        $('#contactMsg').text('Linkedin updated successfully!')
                        $('#contactMsg').show();
                        setTimeout(function() {
                            $('#contactMsg').fadeOut();
                        }, 1000);

                        $('#linkedinUser').val($('#linkedinUser').val());
                    },
                    error: function(error) {
                        console.error('linkedinUpdateButton go wrong:', error);
                    }
                });
            });

            //Show data

            function listSkills() {
                $.ajax({
                    url: '../../src/Devfolio/Get.php',
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
                                imgElement.attr('src', "../../" + skillGallery);
                                imgElement.attr('id', skillId);

                                imgElement.css({
                                    'width': '110px',
                                    'height': '60px',
                                    'margin': 5,
                                    'cursor': 'pointer',
                                    "background-color": "white",
                                    "border": "1px solid green",
                                    "padding": 10,
                                    "border-radius": "20px",

                                });
                                imgElement.click(function() {
                                    var id = $(this).attr('id');
                                    var src = $(this).attr('src');

                                    showAlert()

                                    function showAlert() {
                                        var alertBox = document.createElement('div');
                                        alertBox.classList.add('custom-alert');

                                        alertBox.innerHTML = `
                                    <p>This picture will be deleted.</p>
                                    <p>Are you sure?</p>
                                    <img src="` + src + `" alt='Logo' width='110px' height='60px' /><br> 
                                    <button class="red" id="confirmDelete">Yes</button>
                                    <button id="cancelDelete">No</button>
                                `;
                                        document.body.appendChild(alertBox);
                                        $(document).on('click', '#confirmDelete', function() {
                                            deleteSkill(id, src);
                                            alertBox.remove();
                                            $("#skillsGallery").empty();
                                            listSkills();
                                        });

                                        $(document).on('click', '#cancelDelete', function() {
                                            alertBox.remove();
                                        });
                                    }
                                });

                                $("#boxSkills").css({
                                    "width": 600,
                                    "padding": 10,
                                    "background-color": "white",
                                    "border": "1px solid green",
                                });
                                $("#skillsGallery").append(imgElement)
                            }

                        }

                    },
                    error: function(error) {
                        console.error(
                            'No skill found. Error:',
                            error);
                    }
                });
            }

            function listProjects() {
                $.ajax({
                    url: '../../src/Devfolio/Get.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        action: 'getProjects'
                    },
                    success: function(data) {
                        var theseProjects = data;
                        $("#projectsGallery").empty();
                        if (theseProjects.length >= 1) {

                            for (var i = 0; i < theseProjects.length; i++) {
                                var projectId = data[i].id;
                                var projectLogo = data[i].screenshot;
                                var projectsName = data[i].project_name;
                                var projectsLink = data[i].project_link;

                                var imgElement = $('<img>');
                                imgElement.attr('src', '../../' + projectLogo);
                                imgElement.attr('id', projectId);
                                imgElement.css({
                                    'width': '80px',
                                    'height': '60px',
                                    'margin': 5,
                                    'cursor': 'pointer',
                                    "background-color": "white", // Cor de fundo verde
                                    "border": "1px solid green",
                                    "padding": 10,
                                    "border-radius": "20px",
                                });

                                $("#projectsGallery").append(imgElement)

                                $('#labelProjects').append(projectsName)
                                $('#project_link').attr('href', projectsLink)

                                imgElement.click(function() {
                                    var id = $(this).attr('id');
                                    var src = $(this).attr('src');
                                    showAlert()

                                    function showAlert() {
                                        var alertBox = document.createElement('div');
                                        alertBox.classList.add('custom-alert');

                                        alertBox.innerHTML = `
                                    <p>This project will be deleted.</p>
                                    <p>Are you sure?</p>
                                    <img src="` + src + `" alt='Screenshot' width='150px' height='60px' /><br><br>
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="col s6">
                                            <button class="red" id='deleteProject' white-text">Yes</button>
                                            </div>
                                            <div class="col s6">
                                                <button id='noDeleteProject'>No</button>    
                                            </div>
                                        </div>
                                    </div>
                                    
                                `;

                                        document.body.appendChild(alertBox);

                                        $('#deleteProject').on('click', function() {
                                            deleteProject(id, src);
                                            alertBox.remove();
                                            $("#labelProjects").empty();
                                            $("#projectGallery").empty();
                                            M.toast({
                                                html: 'Project updated successfully!'
                                            })
                                            listProjects();
                                        });

                                        $('#noDeleteProject').on('click', function() {
                                            alertBox.remove();

                                        });

                                    }

                                });
                            }
                        } else {
                            var htmlElement = $('<h4>');
                            htmlElement.attr('id', "noProjectDatabase");
                            htmlElement.text('No project in database!').css({
                                'color': 'black',
                                'text-align': 'center',
                                'padding': 10
                            });

                            $("#boxProjects").append(htmlElement);
                        }
                    }
                });
            }

            function showProfile() {
                try {
                    $.ajax({
                        url: '../../src/Devfolio/Get.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            action: 'getProfile'
                        },
                        success: function(data) {
                            var thisProfileId = data.id;
                            var thisProfilePath = data.profile;
                            var thisProfileTitle = data.title;
                            var thisProfileSubtitle = data.subtitle;

                            if (thisProfileId >= 1) {

                                $('#profile-pic').prop('disabled', false);
                                $('#profile-pic').prop('src', '../../' + thisProfilePath);
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
                                $('#profileSubtitle').val(thisProfileSubtitle);
                            }
                        },
                        error: function(error) {
                            console.log("setState requisition go wrong! code: " + error)
                        }
                    });

                } catch (erro) {
                    console.error(erro);
                }
            };

            function listOthers() {
                $.ajax({
                    url: '../../src/Devfolio/Get.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        action: 'getOthers'
                    },
                    success: function(data) {

                        var theseOthers = data;
                        $("#othersGallery").empty();
                        if (theseOthers.length >= 1) {
                            for (var i = 0; i < theseOthers.length; i++) {
                                var eventId = data[i].id;
                                var eventBanner = data[i].banner;
                                var eventTitle = data[i].title;
                                var eventLink = data[i].banner_link;

                                var imgElement = $('<img>');
                                imgElement.attr('src', '../../' + eventBanner);
                                imgElement.attr('id', eventId);
                                imgElement.css({
                                    'width': '80px',
                                    'height': '60px',
                                    'margin': 5,
                                    'cursor': 'pointer',
                                    "background-color": "white", // Cor de fundo verde
                                    "border": "1px solid green",
                                    "padding": 10,
                                    "border-radius": "20px",
                                });

                                $("#othersGallery").append(imgElement)

                                $('#others_name').append(eventTitle)
                                $('#others_link').attr('href', eventLink)

                                imgElement.click(function() {
                                    var id = $(this).attr('id');
                                    var src = $(this).attr('src');
                                    showAlert()

                                    function showAlert() {
                                        var alertBox = document.createElement('div');
                                        alertBox.classList.add('custom-alert');

                                        alertBox.innerHTML = `
                                    <p>This event will be deleted.</p>
                                    <p>Are you sure?</p>
                                    <img src="` + src + `" alt='Screenshot' width='150px' height='60px' /><br><br>
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="col s6">
                                            <button class="red" id='deleteEvent' white-text">Yes</button>
                                            </div>
                                            <div class="col s6">
                                                <button id='noDeleteEvent'>No</button>    
                                            </div>
                                        </div>
                                    </div>
                                    
                                `;

                                        document.body.appendChild(alertBox);

                                        $('#deleteEvent').on('click', function() {
                                            deleteEvent(id, src);
                                            console.log("Event deleted!")
                                            alertBox.remove();

                                            M.toast({
                                                html: 'Event ' + eventTitle + ' updated successfully!'
                                            })
                                            listOthers();
                                        });

                                        $('#noDeleteEvent').on('click', function() {
                                            alertBox.remove();

                                        });

                                    }

                                });
                            }
                        } else {
                            var htmlElement = $('<h4>');
                            htmlElement.attr('id', "noOthersInDatabase");
                            htmlElement.text('No event in database!').css({
                                'color': 'black',
                                'text-align': 'center',
                                'padding': 10
                            });

                            $("#boxOthers").append(htmlElement);
                        }
                    },
                    error: function(error) {
                        console.error('listOthers go wrong. Error:', error);
                    }
                });
            }

            function showContacts() {
                $.ajax({
                    url: '../../src/Devfolio/Get.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        action: 'getContacts'
                    },
                    success: function(data) {
                        var theseContacts = data.id;
                        if (theseContacts >= 1) {
                            $('#emailUser').val(data.email);
                            $('#githubUser').val(data.github);
                            $('#linkedinUser').val(data.linkedin);
                        }

                    },
                    error: function(error) {
                        console.error('showContacts go wrong. Erro: '+error);
                    }
                });
            }

            //Delete buttons
            function deleteEvent(id, path) {
                let url = path;
                if (url.startsWith("../../")) {
                    url = url.substring(6);
                }
                $.ajax({
                    url: '../../src/Devfolio/Delete.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id,
                        dir: url,
                        action: 'deleteEvent'
                    },
                    success: function(data) {
                        console.log("ok")
                    },
                    error: function(error) {
                        console.error('Problems with deleteEvent function in update.php. Error:', error);
                    }

                });
            }

            function deleteProject(id, path) {
                let url = path;
                if (url.startsWith("../../")) {
                    url = url.substring(6);
                }
                $.ajax({
                    url: '../../src/Devfolio/Delete.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id,
                        dir: url,
                        action: 'deleteProject'
                    },
                    success: function(data) {
                        console.log("ok")
                    },
                    error: function(error) {
                        console.error('No id found. Error:', error);
                    }

                });
            }

            function deleteSkill(id, path) {
                let url = path;
                if (url.startsWith("../../")) {
                    url = url.substring(6);
                }
                $.ajax({
                    url: '../../src/Devfolio/Delete.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id,
                        dir: url,
                        action: 'deleteSkill'
                    },
                    success: function(data) {

                    },
                    error: function(error) {
                        console.error('No id found. Error:', error);
                    }
                });
            }
        });
    </script>

</body>

</html>