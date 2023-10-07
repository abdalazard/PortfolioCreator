<h5>Redes Sociais</h5>
<h3 id="socialMsg" style="font-size: 15px; background-color: green; color: white; text-align:center;">
</h3>
<!-- table: socials -->

<form id="formSocial">
    <div class="row">
        <div class="col s6 center">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Digite seu melhor e-mail">
        </div>
    </div>
    <div class="row">
        <div class="col s6 center">
            <label for="github">Github</label>
            <input type="text" name="github" placeholder="URL do Github">
        </div>
    </div>
    <div class="row">
        <div class="col s6 center">
            <label for="linkedin">Linkedin</label>
            <input type="text" name="linkedin" placeholder="URL do Linkedin">
        </div>
    </div>
    <div class="row">
        <div class="col s6 center">
            <input type="submit" id="gravaSocial">
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
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
                    $('#formSocial').hide();
                },
                error: function(error) {
                    console.error('Erro ao enviar dados:', error);
                }
            });
        });
    });
</script>