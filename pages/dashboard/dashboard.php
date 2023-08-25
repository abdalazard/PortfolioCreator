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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Inicio</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="#modalLogin" class="modal-trigger">Atualizar pagina</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="#">Mudar Layout(Em Breve)</a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black modal-trigger "
                        href="../../src/Logout/Logout.php">Deslogar</a>
                </li>
            </ul>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div id="msg">
            <h6>Logado com sucesso!</h6>
        </div>

        <h1>Dashboard</h1>
        <div>
            <h6>Olá, <?php echo $_SESSION['user']; ?></h6>
        </div>

        <div id="modalLogin" class="modal modalLogin">
            <div class="row">
                <div class="col s2 offset-s10">
                    <a href="#!" class="modal-close btn-white black-text closeButton">Fechar</a>
                </div>
            </div>
            <div class="modal-content">
                <h2>Meu portfólio</h2>
                <h5>Profile</h5>
                <div>
                    <form action="src/Portfolio/Edit.php" METHOD="POST">
                        <div class="row">
                            <div class="col s12">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" placeholder="Upload de foto" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="titulo">Titulo</label>
                                <input type="text" name="titulo" placeholder="Título" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="subtitulo">Subtitulo</label>
                                <input type="text" name="subtitulo" placeholder="Subtitulo(tecnologias)" required>
                            </div>
                        </div>

                </div>
                <div class="row">
                    <div class="col s12">
                        <input type='submit' value="Atualizar" class="btn white black-text">
                    </div>
                </div>
                </form>
            </div>
            <h5>Projetos</h5>
            <hr />
            <div>
                <form action="src/Portfolio/Edit.php" METHOD="POST">
                    <div class="row">
                        <div class="col s12">
                            <label for="projetos">Projetos</label>
                            <input type="text" name="projetos" placeholder="Nome do projeto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label for="URL">URL</label>
                            <input type="text" name="URL" placeholder="URL do projeto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input type='submit' value="Atualizar" class="btn white black-text">
                        </div>
                    </div>
                </form>
            </div>
            <h5>Palestras, workshops, cursos e certificações</h5>
            <hr />
            <div>
                <form action="src/Portfolio/Edit.php" METHOD="POST">
                    <div class="row">
                        <div class="col s12">
                            <label for="banner">Flyer/banner</label>
                            <input type="file" name="banner" placeholder="Banner de apresentação">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input type='submit' value="Atualizar" class="btn white black-text">
                        </div>
                    </div>
                </form>
            </div>
            <h5>Redes Sociais</h5>
            <hr />
            <div>
                <form action="src/Portfolio/Edit.php" METHOD="POST">
                    <div class="row">
                        <div class="col s12">
                            <label for="github"></label>
                            <input type="text" name="github" placeholder="URL do Github">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label for="linkedin"></label>
                            <input type="text" name="linkedin" placeholder="URL do Linkedin">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input type='submit' value="Atualizar" class="btn white black-text">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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