$("#msg").addClass("logged");
$(document).ready(function() {
    // var profileOk = false;
    // var skillsOk = false;
    // var projectOk = false;
    // var othersOk = false;
    // var socialOk = false;
    //Create
    setTimeout(function() {
        $('#msg').fadeOut();
    }, 1000);

    $('#preview').prop('disabled', true);
    $('#preview').text("Você ainda não pode visualizar seu portfólio");
    $('#preview').css({"background-color": "grey"});
    $('#verifica').hide();

    //Profile
    $('#profileMsg').hide();
    $('#profileMsg2').hide();

    $('#modalProfileButton').on('click',function () {
        $.ajax({
            url: '../../src/Portfolio/Portfolio.php@getProfile',
            type: 'GET', // Método da requisição (GET no caso)
            dataType: 'json', // Tipo de dados esperado na resposta (JSON no caso)
            success: function(data) {
                // Função chamada quando a requisição é bem-sucedida
                console.log('Dados recebidos:', data);
            },
            error: function(error) {
                // Função chamada em caso de erro na requisição
                console.error('Erro na requisição:', error);
            }
        });        

    });


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
                $('#profileMsg').text('Perfil salvo com sucesso!');
                $('#profileMsg2').text('Perfil salvo com sucesso!');

                $('#profileMsg2').show();
                $('#profileMsg').show();
                // Limpar os campos do formulário
                $('#profile').val('');
                $('#titulo').val('');
                $('#subtitulo').val('');

                $('#formProfile').hide();
                profileOk = $('#profileOk').val(true);
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

                projectOk = $('#projectOk').val(true);
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
                $('#formskills').hide();

                skillsOk = $('#skillsOk').val(true);
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
                $('#formOthers').hide();

                othersOk = $('#othersOk').val(true);
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Social

    $('#socialMsg').hide();
    $('#socialMsg2').hide();

    $('#gravaSocial').on('click', function(event) {
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
                socialOk = $('#socialOk').val(true);
                $('#formSocial').hide();

                checkForms();
                
            },
            error: function(error) {
                console.error('Erro ao enviar dados:', error);
            }
        });
    });

    //Finaliza portfolio

    function checkForms() {

        var profileOk = $('#profileOk').val();
        var skillsOk = $('#skillsOk').val();
        var projectOk = $('#projectOk').val();
        var othersOk = $('#othersOk').val();
        var socialOk = $('#socialOk').val();

        var allOk = [profileOk, skillsOk, projectOk, othersOk, socialOk];

        if(allOk.every(function(item) { return item === true; })) {
            console.log('Todos estão OK!');
            $('#createNewPortfolio').slideUp(1000, function() {
                // Esta função será chamada após a animação de slide terminar
                $(this).hide(); // Esconde a div após a animação
            });           
            $('#preview').prop('disabled', false);
            $('#preview').text("Visualize seu portfólio!");
            $('#preview').css({"background-color": "green"});
            $('body').append('<h4 class="center">Clique no botão verde para visualizar seu portfolio com o template padrão!</h4>')

         } else {
            // Pelo menos um item não é true
            console.log(item);
         }
    };

    function existData(data) {

        console.log(data);
        // getProjects
        // $.ajax({
        //     url: '../../src/Portfolio/Portfolio/'+data.table,
        //     type: 'GET',
        //     processData: false,
        //     contentType: false,
        //     data: data,
        //     success: function(response) {
             
        //         checkForms();
                
        //     },
        //     error: function(error) {
        //     }
        // });
    }

});