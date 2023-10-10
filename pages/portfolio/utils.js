$(document).ready(function() {
    checkForms()
    //Create
    setTimeout(function() {
        $('#msg').fadeOut();
    }, 1000);

    $('#preview').click(function(event) {
        event.preventDefault();
    });        
    $('#preview').text("Você ainda não pode visualizar seu portfólio");
    $('#preview').css({"background-color": "grey"});

    //Profile
    $('#profileMsg').hide();
    $('#profileMsg2').hide();
    
    $('#gravaProfile').on('click', function(event) {
        event.preventDefault();
        var formProfile = new FormData();
        formProfile.append('profile', $('#profile')[0].files[0]); // Obtem o arquivo do input)
        formProfile.append('titulo', $('#titulo').val()); // Obtem o arquivo do input)
        formProfile.append('subtitulo', $('#subtitulo').val()); 

        $.ajax({
            url: '../../src/Portfolio/Create/Profile.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formProfile,
            success: function(response) {
                console.log('resposta: '+response)

                $('#profileMsg').text('Perfil salvo com sucesso!');
                $('#profileMsg2').text('Perfil salvo com sucesso!');

                $('#profileMsg2').show();
                $('#profileMsg').show();
                // Limpar os campos do formulário
                $('#profile').val('');
                $('#titulo').val('');
                $('#subtitulo').val('');

                $('#formProfile').hide();
                setState(`profile`, 1);

            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Projetos

    $('#projetoMsg').hide();
    $('#projetoMsg2').hide();

    $('#gravaProjeto').on('click', function(event) {
        event.preventDefault();
        var formProjects = new FormData();
        formProjects.append('inputPrint', $('#inputPrint')[0].files[0]); // Obtem o arquivo do input)
        formProjects.append('inputNomeProjeto', $('#inputNomeProjeto').val()); // Obtem o arquivo do input)
        formProjects.append('inputUrlProjeto', $('#inputUrlProjeto').val()); // Obtem o arquivo do input)
        var nomeProj = $('#inputNomeProjeto').val();
        $.ajax({
            url: '../../src/Portfolio/Create/Project.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formProjects,
            success: function(response) {
                $('#projetoMsg').text("Projeto " + nomeProj + " salvo com sucesso");
                $('#projetoMsg').show();
                $('#projetoMsg2').text("Projeto " + nomeProj + " salvo com sucesso");
                $('#projetoMsg2').show();
                // Limpar os campos do formulário
                $('#inputPrint').val('');
                $('#inputNomeProjeto').val('');
                $('#inputUrlProjeto').val('');
                $('#formProjects').hide();
                setState(`projects`, 1);

                
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Skills

    $('#skillMsg').hide();
    $('#skillMsg2').hide();

    $('#formSkills').on('submit', function(event) {
        event.preventDefault();
        var formSkills = new FormData();
        var files = $('#skill')[0].files;

        for (var i = 0; i < files.length; i++) {
            formSkills.append('skill[]', files[i]);
        }
        $.ajax({
            url: '../../src/Portfolio/Create/Skills.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formSkills,
            success: function(response) {
                $('#skillMsg').text('Habilidades salvas com sucesso')
                $('#skillMsg').show();
                $('#skillMsg2').text('Habilidades salvas com sucesso')
                $('#skillMsg2').show();

                // Limpar os campos do formulário
                $('#skill').val('');
                $('#formskills').hide();
                $('#modalSkillsButton').hide();
                setState(`skills`, 1);

            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Others

    $('#othersMsg').hide();
    $('#othersMsg2').hide();

    $('#gravaOthers').on('click', function(event) {
        event.preventDefault();
        var formOthers = new FormData();
        formOthers.append('titulo', $('#titulo_others').val()); // Obtem o arquivo do input)
        formOthers.append('others', $('#others')[0].files[0]); // Obtem o arquivo do input)
        formOthers.append('url_others', $('#url_others').val()); // Obtem o arquivo do input)
        var nomePub = $('#titulo_others').val();

        $.ajax({
            url: '../../src/Portfolio/Create/Others.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formOthers,
            success: function(response) {
                $('#othersMsg').text("O link do evento " + nomePub + " salvo com sucesso");
                $('#othersMsg').show();
                $('#othersMsg2').text("O link do evento " + nomePub + " salvo com sucesso");
                $('#othersMsg2').show();
                // Limpar os campos do formulário
                $('#titulo_others').val('');
                $('#others').val('');
                $('#url_others').val('');

                $('#modalOthersButton').hide();
                setState(`others`, 1);

                
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Social

    $('#socialMsg').hide();
    $('#socialMsg2').hide();

    $('#formSocial').on('submit', function(event) {
        event.preventDefault();
        var formSocial = new FormData();
        formSocial.append('email', $('#email').val()); 
        formSocial.append('github', $('#github').val()); 
        formSocial.append('linkedin', $('#linkedin').val()); 

        $.ajax({
            url: '../../src/Portfolio/Create/Social.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formSocial,
            success: function(response) {
                $('#socialMsg').text("Contatos salvos com sucesso!");
                $('#socialMsg').show();
                $('#socialMsg2').text("Contatos salvos com sucesso!");
                $('#socialMsg2').show();
                // Limpar os campos do formulário
                $('#email').val('');
                $('#github').val('');
                $('#linkedin').val('');
                $('#modelSocialButton').hide();
                setState(`contacts`, 1);

            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });

    });
});

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
                    var stateId = data.id;
                    var msgState = data.msg;

                    userIdState = data.userId;
                    profileState = data.profile;
                    skillsState = data.skills;
                    projectsState = data.projects;
                    othersState = data.others;
                    contactsState = data.contacts;

                    if(profileState == true) {
    
                        $.ajax({
                            url: '../../src/Portfolio/Get.php',
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
                
                                    $('#profileMsg').text('Perfil já preenchido!');
                
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
                            url: '../../src/Portfolio/Get.php',
                            type: 'GET', 
                            dataType: 'json',
                            data: {
                                userId: userId,
                                action: 'getSkills'
                            },
                            success: function(data) {
                                var theseSkills = data;
                                if(theseSkills.length >= 1) {
                                    $('#skillMsg').text('Habilidades já presentes no banco de dados')
                                    $('#skillMsg').show();
                                    $('#modalSkillsButton').hide();
                                }
                
                            },
                            error: function(error) {
                                console.error('Não se preocupe, só não existe nenhuma skill com este id. Erro:', error);
                            }
                        });    
                    }

                    if(projectsState == true) {
    
                        $.ajax({
                            url: '../../src/Portfolio/Get.php',
                            type: 'GET', 
                            dataType: 'json',
                            data: {
                                userId: userId,
                                action: 'getProjects'
                            },
                            success: function(data) {
                                var theseProjects = data;
                                if(theseProjects.length >= 1) {
                                    $('#projetoMsg').text('Projetos já presentes no banco de dados')
                                    $('#projetoMsg').show();
                                    $('#modelProjectsButton').hide();
                                                    
                                }
                
                            },
                            error: function(error) {
                                console.error('Não se preocupe, só não existe nenhuma skill com este id. Erro:', error);
                            }
                        });      
                    }
                    if(projectsState == true) {
                        $.ajax({
                            url: '../../src/Portfolio/Get.php',
                            type: 'GET', 
                            dataType: 'json',
                            data: {
                                userId: userId,
                                action: 'getOthers'
                            },
                            success: function(data) {
                                var theseOthers = data;
                                if(theseOthers.length >= 1) {
                                    $('#othersMsg').text('Eventos já presentes no banco de dados')
                                    $('#othersMsg').show();
                                    $('#modalOthersButton').hide();   
                                }
                
                            },
                            error: function(error) {
                                console.error('Não se preocupe, só não existe nenhuma skill com este id. Erro:', error);
                            }
                        });   
                    }
                    if(othersState == true) {
                        $.ajax({
                            url: '../../src/Portfolio/Get.php',
                            type: 'GET', 
                            dataType: 'json',
                            data: {
                                userId: userId,
                                action: 'getOthers'
                            },
                            success: function(data) {
                                var theseOthers = data;
                                if(theseOthers.length >= 1) {
                                    $('#othersMsg').text('Eventos já presentes no banco de dados')
                                    $('#othersMsg').show();
                                    $('#modalOthersButton').hide();   
                                }
                
                            },
                            error: function(error) {
                                console.error('Não se preocupe, só não existe nenhuma skill com este id. Erro:', error);
                            }
                        });  
                    }
                    if(contactsState == true) {
                        $.ajax({
                            url: '../../src/Portfolio/Get.php',
                            type: 'GET', 
                            dataType: 'json',
                            data: {
                                userId: userId,
                                action: 'getContacts'
                            },
                            success: function(data) {
                                var theseContacts = data.id;
                                if(theseContacts >= 1) {
                                    $('#socialMsg').text('Contatos já presentes no banco de dados')
                                    $('#socialMsg').show();
                                    $('#modelSocialButton').hide();                    
                                }       
                
                            },
                            error: function(error) {
                                console.error('Não se preocupe, só não existe nenhuma skill com este id. Erro:', error);
                            }            
                        });
                    }
                    if(profileState == true && skillsState == true && projectsState == true && othersState == true && contactsState == true) {
                        $('#createNewPortfolio').slideUp(1000, function() {
                            $(this).hide(); 
                        });
                        
                        $('#preview').removeClass('disabled');
                        $('#preview').text("Visualize seu portfólio!");
                        $('#preview').css({"background-color": "green"});
                        $('#finished').append('<h4 class="center">Já encontramos um portfolio seu gravado. Clique no botão verde para visualizar seu portfolio com o template padrão!</h4>')
                        $('#preview').click(function() {
                            window.location.href = '../dashboard/visualization.php';
                        });
                    } 
                },
                error: function(error) {
                    console.log("Requisição do FormState deu errado! codigo: "+error)
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
 
