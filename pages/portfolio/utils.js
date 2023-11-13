$(document).ready(function() {
    checkForms()
    //Create
    setTimeout(function() {
        $('#msg').fadeOut();
    }, 1000);

    $('#preview').click(function(event) {
        event.preventDefault();
    });        
    $('#preview').text("You still can't see your Devfolio.");
    $('#preview').css({"background-color": "grey"});

    //Profile
    $('#profileMsg').hide();
    $('#profileMsg2').hide();
    
    $('#saveProfile').on('click', function(event) {
        event.preventDefault();
        var formProfile = new FormData();
        formProfile.append('profile', $('#profile')[0].files[0]);
        formProfile.append('title', $('#title').val());
        formProfile.append('subtitle', $('#subtitle').val()); 

        $.ajax({
            url: '../../src/Devfolio/Create/Profile.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formProfile,
            success: function(response) {
                console.log('resposta: '+response)

                $('#profileMsg').text('Profile saved successfully!');
                $('#profileMsg2').text('Profile saved successfully!');

                $('#profileMsg2').show();
                $('#profileMsg').show();

                $('#profile').val('');
                $('#title').val('');
                $('#subtitle').val('');

                $('#formProfile').hide();
                setState(`profile`, 1);

            },
            error: function(error) {
                console.error('Error to attempt send data:', error);
            }
        });
    });

    //Projetos

    $('#projectMsg').hide();
    $('#projectMsg2').hide();

    $('#saveProject').on('click', function(event) {
        event.preventDefault();
        var formProjects = new FormData();
        formProjects.append('screenShotInput', $('#screenShotInput')[0].files[0]); // Obtem o arquivo do input)
        formProjects.append('projectNameInput', $('#projectNameInput').val()); // Obtem o arquivo do input)
        formProjects.append('projectLinkInput', $('#projectLinkInput').val()); // Obtem o arquivo do input)
        var nomeProj = $('#inputNomeProjeto').val();
        $.ajax({
            url: '../../src/Devfolio/Create/Project.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formProjects,
            success: function(response) {
                $('#projectMsg').text("Project "+nomeProj+" saved sucessfully!");
                $('#projectMsg').show();
                $('#projectMsg2').text("Project "+nomeProj+" saved sucessfully!");
                $('#projectMsg2').show();
                // Limpar os campos do formulário
                $('#screenShotInput').val('');
                $('#projectNameInput').val('');
                $('#projectLinkInput').val('');

                $('#formProjects').hide();
                setState(`projects`, 1);

                
            },
            error: function(error) {
                console.error('Error to attempt to send data. code:', error);
            }
        });
    });

    //Skills
    $('#skillMsg').hide();
    $('#skillMsg2').hide();

    $('#saveSkills').on('click', function(event) {
        event.preventDefault();
        var formSkills = new FormData();
        var files = $('#skill')[0].files;

        for (var i = 0; i < files.length; i++) {
            formSkills.append('skill[]', files[i]);
        }
        $.ajax({
            url: '../../src/Devfolio/Create/Skills.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formSkills,
            success: function(response) {
                $('#skillMsg').text('All skills were saved successfully!')
                $('#skillMsg').show();
                $('#skillMsg2').text('All skills were saved successfully!')
                $('#skillMsg2').show();

                // Limpar os campos do formulário
                $('#skill').val('');
                $('#formskills').hide();
                $('#modalSkillsButton').hide();
                setState(`skills`, 1);

            },
            error: function(error) {
                console.error('Error to attempt to send data. code:', error);
            }
        });
    });

    //Others

    $('#othersMsg').hide();
    $('#othersMsg2').hide();

    $('#saveOthers').on('click', function(event) {
        event.preventDefault();
        var formOthers = new FormData();
        formOthers.append('title', $('#title_others').val()); // Obtem o arquivo do input)
        formOthers.append('banner', $('#banner')[0].files[0]); // Obtem o arquivo do input)
        formOthers.append('link', $('#link_others').val()); // Obtem o arquivo do input)
        var nomePub = $('#title_others').val();

        $.ajax({
            url: '../../src/Devfolio/Create/Others.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formOthers,
            success: function(response) {
                $('#othersMsg').text("The event " + nomePub + " was created successfully");
                $('#othersMsg').show();
                $('#othersMsg2').text("The event" + nomePub + " was created successfully");
                $('#othersMsg2').show();
                // Limpar os campos do formulário
                $('#title_others').val('');
                $('#banner').val('');
                $('#link_others').val('');

                $('#formOthers').hide();

                $('#modalOthersButton').hide();
                setState(`others`, 1);

                
            },
            error: function(error) {
                console.error('Error to attempt to send data. code:', error);
            }
        });
    });

    //Social

    $('#contactMsg').hide();
    $('#contactMsg').hide();

    $('#saveContact').on('click', function(event) {
        event.preventDefault();
        var formSocial = new FormData();
        formSocial.append('email', $('#email').val()); 
        formSocial.append('github', $('#github').val()); 
        formSocial.append('linkedin', $('#linkedin').val()); 

        $.ajax({
            url: '../../src/Devfolio/Create/Contacts.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formSocial,
            success: function(response) {
                $('#contactMsg').text("Contatos salvos com sucesso!");
                $('#contactMsg').show();
                $('#contactMsg').text("Contatos salvos com sucesso!");
                $('#contactMsg').show();
                // Limpar os campos do formulário
                $('#email').val('');
                $('#github').val('');
                $('#linkedin').val('');
                $('#modalContactButton').hide();

                $('#formContact').hide();

                setState(`contacts`, 1);

            },
            error: function(error) {
                console.error('Error to attmpet to send data. code:', error);
            }
        });

    });
});

function checkForms() {

    try {
        $.ajax({
            url: '../../src/Devfolio/Get.php',
            type: 'GET',
            dataType: 'json',
            data: {
                action: "getstate"
            },
            success: function(data) {
                
                userIdState = data.userId;
                profileState = data.profile;
                skillsState = data.skills;
                projectsState = data.projects;
                othersState = data.others;
                contactsState = data.contacts;

                if(profileState == true) {

                    $.ajax({
                        url: '../../src/Devfolio/Get.php',
                        type: 'GET', 
                        dataType: 'json',
                        data: {
                            userId: userId,
                            action: 'getProfile' 
                        },
                        success: function(data) {
                            var thisProfileId = data.id;
                            var thisProfilePath = data.profile;
            
                            if(thisProfileId >= 1) {
            
                                $('#profileMsg').text('Profile saved!');
            
                                $('#profileMsg').show();
                                $('#modalProfileButton').hide();
                                $('#profile-pic').prop('disabled', false);
                                $('#profile-pic').prop('src','../../'+thisProfilePath);
                                $('#profile-pic').css({
                                    'width': '50px',
                                    'height': '50px',
                                    'border-radius': '50%',
                                    'object-fit': 'cover',
                                    'display': 'block',
                                    'margin': 'auto',
                                    'border': '2px solid #ffffff'
                                    });                    
                                $('#profile-pic').show();
                                $('#profileMsg').show();                     
                            }
                        }
                    });
                }

                if(skillsState == true) {

                    $.ajax({
                        url: '../../src/Devfolio/Get.php',
                        type: 'GET', 
                        dataType: 'json',
                        data: {
                            userId: userId,
                            action: 'getSkills'
                        },
                        success: function(data) {
                            var theseSkills = data;
                            if(theseSkills.length >= 1) {
                                $('#skillMsg').text('Skills already exist in database.')
                                $('#skillMsg').show();
                                $('#modalSkillsButton').hide();
                            }
            
                        },
                        error: function(error) {
                            console.error('No skill with this id. Error:', error);
                        }
                    });    
                }

                if(projectsState == true) {

                    $.ajax({
                        url: '../../src/Devfolio/Get.php',
                        type: 'GET', 
                        dataType: 'json',
                        data: {
                            userId: userId,
                            action: 'getProjects'
                        },
                        success: function(data) {
                            var theseProjects = data;
                            if(theseProjects.length >= 1) {
                                $('#projectMsg').text('Project already exists in database')
                                $('#projectMsg').show();
                                $('#modalProjectsButton').hide();
                                                
                            }
            
                        },
                        error: function(error) {
                            console.error('No project with this id. Error:', error);
                        }
                    });      
                }
                if(othersState == true) {
                    $.ajax({
                        url: '../../src/Devfolio/Get.php',
                        type: 'GET', 
                        dataType: 'json',
                        data: {
                            userId: userId,
                            action: 'getOthers'
                        },
                        success: function(data) {
                            var theseOthers = data;
                            if(theseOthers.length >= 1) {
                                $('#othersMsg').text('Events already exist in database')
                                $('#othersMsg').show();
                                $('#modalOthersButton').hide();   
                            }
            
                        },
                        error: function(error) {
                            console.error('No items found. Error:', error);
                        }
                    });  
                }
                if(contactsState == true) {
                    $.ajax({
                        url: '../../src/Devfolio/Get.php',
                        type: 'GET', 
                        dataType: 'json',
                        data: {
                            userId: userId,
                            action: 'getContacts'
                        },
                        success: function(data) {
                            var theseContacts = data.id;
                            if(theseContacts >= 1) {
                                $('#contactMsg').text('Contacts already exist in database.')
                                $('#contactMsg').show();
                                $('#modalContactButton').hide();                    
                            }       
            
                        },
                        error: function(error) {
                            console.error('No contacts found. Error:', error);
                        }            
                    });
                }
                if(profileState == true && skillsState == true && projectsState == true && othersState == true && contactsState == true) {
                    $('#createNewPortfolio').slideUp(1000, function() {
                        $(this).hide(); 
                    });
                    
                    $('#preview').removeClass('disabled');
                    $('#preview').text("Take a look in your new Devfolio!");
                    $('#preview').css({"background-color": "green"});
                    $('#finished').append('<h4 class="center">You already have a devfolio saved. Click on the green button to view your Devfolio using the default template!</h4>')
                    $('#preview').click(function() {
                        window.location.href = '../dashboard/visualization.php';
                    });
                } 
            },
            error: function(error) {   
                console.log("State requisition with problems! code: "+error)
            }
        });           
    } catch (erro) {
        console.error(erro);
    }
};

function setState(col, stt) {
    var column = col;
    var stt = stt;
    var state = new FormData();
    state.append('column', column); 
    state.append('state', stt);
    state.append('action', "setState");

    $.ajax({
        url: '../../src/Devfolio/Create/State.php',
        type: 'POST',
        processData: false,
        contentType: false,
        data: state,
        success: function(data) {
            console.log("utils: setState updated")
            checkForms()
        },
        error: function(error) {
            console.log("This function setState gone wrong!")
        }
    });
}
 
