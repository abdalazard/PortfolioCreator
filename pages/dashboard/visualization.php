<?php
include __DIR__ . '/../../db/Connection.php';

include '../../src/Portfolio/Portfolio.php';
include '../../auth/Authentication.php';

$newInfo = new Portfolio;
$info = $newInfo->getInfo($_SESSION['id']);

$newProject = new Portfolio;
$projects = $newProject->getProjects($_SESSION['id']);

$newSkill = new Portfolio;
$skills = $newSkill->getSkills($_SESSION['id']);

$newOthers = new Portfolio;
$others = $newOthers->getOthers($_SESSION['id']);

$newSocial = new Portfolio;
$social = $newSocial->getSocial($_SESSION['id']);

include_once '../../icon/network.php';

?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>Portfolio</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="color-scheme" content="light only" />
    <meta name="description" content="Meu portfolio." />
    <meta property="og:site_name" content="Portfolio" />
    <meta property="og:title" content="Portfolio" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Meu portfolio." />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="800" />
    <meta property="og:url" content="https://abdalazard.online" />
    <meta property="twitter:card" content="summary_large_image" />
    <link rel="canonical" href="https://abdalazard.online" />
    <link
        href="https://fonts.googleapis.com/css2?display=swap&family=Inter:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../styles.css" />
    <link rel="stylesheet" href="../../styles2.css" />
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />
    <script type="text/javascript" src="../../index.js">
    </script>
</head>

<body>
    <nav>
        <div class="nav-wrapper black">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../../admin.php">Inicio</a></li>
            </ul>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="#" class="modal-trigger">Publicar</a></li>
            </ul>

            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="#">Mudar Layout(Em Breve)</a></li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn green modal-trigger " href="#">Publicar</a>
                </li>
            </ul>
            <ul class="right">
                <li><a class="waves-effect waves-light btn black modal-trigger " href="#">Voltar</a>
                </li>
            </ul>

        </div>
    </nav>
    <div class="center green" id="msg" name="msg">
        <p style="color:black;"><?php if(isset($_GET['msg'])){echo $_GET['msg'];} ?></p>
    </div>
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <div id="container01" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <div id="image04" class="style1 image"><span class="frame">
                                    <img src="<?php echo '../../' . $info['path']; ?>" alt="Foto" /> </span>
                            </div>
                            <h2 id="text05" class="style1"><?php echo $info['titulo']; ?></h2>
                            <p id="text13" class="style2" style="font-size: 20px"><?php echo $info['subtitulo']; ?></p>
                        </div>
                    </div>
                </div>
                <ul id="icons02" class="style1 icons">
                    <li><a class="n01" href="#start" aria-label="Arrow Down"><svg>
                                <use xlink:href="#icon-8a75e9205b2d7697ad826d592ebf05f0"></use>
                            </svg><span class="label">Arrow Down</span></a></li>
                </ul>
                <hr id="divider02" class="style1 full" />
                <div id="container02" data-scroll-id="start" data-scroll-behavior="bottom" data-scroll-offset="0"
                    data-scroll-speed="3" data-scroll-invisible="1" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <h2 id="text14" class="style3" data-scroll-id="start" data-scroll-behavior="center"
                                data-scroll-offset="0" data-scroll-speed="3" data-scroll-invisible="1">Meus Projetos
                            </h2>
                            <ul id="buttons04" class="style1 buttons">
                                <?php
                                foreach ($projects as $project) {
                                ?>
                                <li>
                                    <a href="<?php echo $project['url_project'] ?>" class="button n01">
                                        <svg>
                                            <use xlink:href="#icon-49c7b76f0edfabe10e324ba1ac396f84"></use>
                                        </svg>
                                        <span class="label"><?php echo $project['project_name'] ?></span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                            <p id="text01" class="style2">Tecnologias usadas em alguns projetos:</p>
                        </div>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="inner" data-onvisible-trigger="1">
                        <ul id="icons01" class="style1 icons">
                            <?php foreach ($skills as $skill) { ?>
                            <li>
                                <div id="image02" class="style2 image">
                                    <img src="<?php echo '../../' . $skill['skill']; ?>" alt="ReactJS" widht="100px"
                                        height="100px" />
                                </div>
                            </li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
                <hr id="divider01" class="style1 full">
                <div id="container03" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <h2 id="text07" class="style3">Palestras e workshops</h2>
                            <br><br>
                            <ul id="icons01" class="style1 icons" style="padding: 25%;">
                                <?php foreach ($others as $other) { ?>

                                <li>
                                    <a href="<?php echo $other['banner_url'] ?>">
                                        <img name="banner" id="banner" src="<?php echo '../../' . $other['banner']; ?>"
                                            alt="Palestra 'Testes com PHPUnit: o básico sobre TDD'" widht="200px"
                                            height="300px" />
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

                <hr id="divider01" class="style1 full">
                <div id="container03" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <h2 id="text07" class="style3">Minhas
                                redes</h2>
                            <ul id="icons01" class="style1 icons">
                                <li><a class="n01" href="linkedin.com/in/<?php echo $social['linkedin']; ?>"
                                        aria-label="LinkedIn"><svg>
                                            <use xlink:href="#icon-bf393d6ea48a4e69e1ed58a3563b94a5"></use>
                                        </svg><span class="label">LinkedIn</span></a></li>
                                <li><a class="n02" href="https://github.com/<?php echo $social['github']; ?>"
                                        aria-label="GitHub"><svg>
                                            <use xlink:href="#icon-8c4b37645de3c276d895d87df51ba614"></use>
                                        </svg><span class="label">GitHub</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p id="text02">abdalazard@gmail.com</p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../index.js"></script>
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