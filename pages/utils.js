$("#msg").addClass("logged");
$(document).ready(function() {

    //Create

    setTimeout(function() {
        $('#msg').fadeOut();
    }, 1000);

    $('#preview').prop('disabled', true);
    $('#preview').text("Você ainda não pode visualizar seu portfólio");
    $('#preview').css({"background-color": "grey"});
    $('#verifica').hide();

    // $('#gravaSocial').on('click', function () {
    //     checkForms();

    // });

    // function checkForms() {

    //     var profileOk = profileOk.value === true;
    //     var skillsOk = skillsOk.value === true;
    //     var projectOk = projectOk.value === true;
    //     var othersOk = othersOk.value === true;
    //     var socialOk = socialOk.value === true;

    //     var allOk = [profileOk, skillsOk, projectOk, othersOk, socialOk];
    //     // var allOk = socialOk;
    //     console.log(socialOk);

    //     if(allOk.every(function(item) { return item; })) {
    //         console.log('Todos estão OK!');

    //         $('#preview').prop('disabled', false);
    //         $('#preview').text("Visualize seu portfólio!");
    //         $('#preview').css({"background-color": "green"});
    //     }
    // };

    //Profile
    $('#profileMsg').hide();

    $('#formProfile').on('submit', function(event) {
        event.preventDefault();
        var formProfile = new FormData(this);
        $.ajax({
            url: '../../src/Portfolio/Create/Profile.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formProfile,
            success: function(response) {
                $('#profileMsg').show();
                // Limpar os campos do formulário
                $('#profile').val('');
                $('#titulo').val('');
                $('#subtitulo').val('');

                $('#formProfile').hide();
                $('#profileOk').val(true);
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Projetos

    $('#projetoMsg').hide();
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
                // Limpar os campos do formulário
                $('#inputPrint').val('');
                $('#inputNomeProjeto').val('');
                $('#inputUrlProjeto').val('');
                $('#projectOk').val(true);
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
                $('#skillMsg').show();
                $('#skillMsg2').show();
                // Limpar os campos do formulário
                $('#skill').val('');
                $('#skillsOk').val(true);
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Others

    $('#projetoMsg').hide();

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
                // Limpar os campos do formulário
                $('#titulo_others').val('');
                $('#others').val('');
                $('#url_others').val('');
                $('#othersOk').val(true);
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Social

    $('#socialMsg').hide();

    $('#gravaSocial').on('click', function(event) {
        event.preventDefault();
        var formSocial = new FormData();
        formSocial.append('email', $('#email').val()); 
        formSocial.append('github', $('#github').val()); 
        formSocial.append('linkedin', $('#linkedin').val()); 

        $.ajax({
            url: '../../src/Portfolio/Create/Skills.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formSocial,
            success: function(response) {
                $('#socialMsg').text("Contatos salvos com sucesso!");
                $('#socialMsg').show();
                // Limpar os campos do formulário
                $('#email').val('');
                $('#github').val('');
                $('#linkedin').val('');
                $('#socialOk').val(true);
                
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

});