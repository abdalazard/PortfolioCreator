<?php
include '../../src/Portfolio/Portfolio.php';
session_start();
$portfolio = new Portfolio;
$info = $portfolio->getInfo($_SESSION['id']);
$projects = $portfolio->getProjects($_SESSION['id']);
$skill = $portfolio->getSkill($_SESSION['id']);
$others = $portfolio->getOthers($_SESSION['id']);
$social = $portfolio->getSocial($_SESSION['id']);


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
    <link href="https://fonts.googleapis.com/css2?display=swap&family=Inter:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../styles.css" />
    <script type="text/javascript" src="../../index.js">
    </script>
</head>

<body class="is-loading">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <div id="container01" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <div id="image04" class="style1 image"><span class="frame"><img src="<?php echo $info['path']; ?>" alt="" /></span></div>
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
                <div id="container02" data-scroll-id="start" data-scroll-behavior="bottom" data-scroll-offset="0" data-scroll-speed="3" data-scroll-invisible="1" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <h2 id="text14" class="style3" data-scroll-id="start" data-scroll-behavior="center" data-scroll-offset="0" data-scroll-speed="3" data-scroll-invisible="1">Meus Projetos
                            </h2>
                            <ul id="buttons04" class="style1 buttons">
                                <?php //foreach(){} 
                                ?>
                                <li>
                                    <a href="https://abdalazard.online/veddit" class="button n01">
                                        <svg>
                                            <use xlink:href="#icon-49c7b76f0edfabe10e324ba1ac396f84"></use>
                                        </svg>
                                        <span class="label">Veddit</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.sagazmultimarcas.com.br" class="button n02">
                                        <svg>
                                            <use xlink:href="#icon-7a66fac84dc5d9fb5fafce395a384d40"></use>
                                        </svg>
                                        <span class="label">Sagaz Multimarcas</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://devculture.shop" class="button n02">
                                        <svg>
                                            <use xlink:href="#icon-7a66fac84dc5d9fb5fafce395a384d40"></use>
                                        </svg>
                                        <span class="label">DevCulture Shop</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://lojapetlove.shop/" class="button n02">
                                        <svg>
                                            <use xlink:href="#icon-7a66fac84dc5d9fb5fafce395a384d40"></use>
                                        </svg>
                                        <span class="label">PetLove</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://abdalazard.online/loginscreen" class="button n03">
                                        <svg>
                                            <use xlink:href="#icon-49c7b76f0edfabe10e324ba1ac396f84"></use>
                                        </svg>
                                        <span class="label">Tela de Login(para cursos)</span>
                                    </a>
                                </li>
                            </ul>
                            <p id="text01" class="style2">Tecnologias usadas em alguns projetos:</p>
                        </div>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="inner" data-onvisible-trigger="1">
                        <ul id="icons01" class="style1 icons">
                            <li>
                                <div id="image01" class="image">
                                    <img src="../../icon/php-icon.png" widht="100px" height="100px" alt="PHP" />
                                </div>
                            </li>
                            <li>
                                <div id="image02" class="style2 image">
                                    <img src="../../icon/laravel-icon.png" alt="Laravel" widht="100px" height="100px" />
                                </div>
                            </li>
                        </ul>
                        <ul id="icons01" class="style1 icons">

                            <li>
                                <div id="image02" class="style2 image">
                                    <img src="../../icon/mysql-icon.png" alt="MySQL" widht="100px" height="100px" />
                                </div>
                            </li>
                            <li>
                                <div id="image02" class="style2 image">
                                    <img src="../../icon/react-icon.png" alt="ReactJS" widht="100px" height="100px" />
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <hr id="divider01" class="style1 full">
                <div id="container03" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <h2 id="text07" class="style3">Palestras e workshops</h2>
                            <ul id="icons01" class="style1 icons">
                                <li>
                                    <div id="image02" class="style2 image">
                                        <img src="<?php echo $others['banner']; ?>" alt="Palestra 'Testes com PHPUnit: o básico sobre TDD'" widht="300px" height="500px" />
                                        <label><?php echo $others['url_banner']; ?></label>
                                    </div>
                                </li>
                            </ul>
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
                                <li><a class="n01" href="linkedin.com/in/<?php echo $social['linkedin']; ?>" aria-label="LinkedIn"><svg>
                                            <use xlink:href="#icon-bf393d6ea48a4e69e1ed58a3563b94a5"></use>
                                        </svg><span class="label">LinkedIn</span></a></li>
                                <li><a class="n02" href="https://github.com/<?php echo $social['github']; ?>" aria-label="GitHub"><svg>
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
</body>

</html>