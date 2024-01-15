<?php

include 'src/Devfolio/Devfolio.php';
include "db/Connection.php";
require_once (__DIR__.'/vendor/autoload.php');

$con = new Connection;

try {
    $getPort = new Devfolio;
    $getPage = $getPort->getPage(1);
    if(!$getPage){
        $msg = "Nothing in database!";
        header("location: nodevfolio.php?msg=" . $msg);
    }
    $profile = $getPort->getProfile($getPage);
    $skills = $getPort->getSkills($getPage);
    $projects = $getPort->getProjects($getPage);
    $others = $getPort->getOthers($getPage);
    $social = $getPort->getContacts($getPage);
    include_once 'icon/network.php';
} catch (Exception $e) {
    $msg = "Erro: " . $e->getMessage() . "\nYou don't have anything registered!";
    header("location: nodevfolio.php?msg=" . $msg);
}

?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <title>DevFolio</title>
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
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="styles2.css" />
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <div id="container01" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <div id="image04" class="style1 image">
                                <span class="frame">
                                    <img src="<?php echo $profile['profile']; ?>" alt="Foto" />
                                </span>
                            </div>
                            <h2 id="text05" class="style1"><?php echo $profile['title']; ?></h2>
                            <p id="text13" class="style2" style="font-size: 20px"><?php echo $profile['subtitle']; ?></p>
                        </div>
                    </div>
                </div>
                <hr id="divider02" class="style1 full" />
                <div id="container02" data-scroll-id="start" data-scroll-behavior="bottom" data-scroll-offset="0"
                    data-scroll-speed="3" data-scroll-invisible="1" class="style1 container default">
                    <div class="wrapper">
                        <div class="inner" data-onvisible-trigger="1">
                            <h2 id="text14" class="style3" data-scroll-id="start" data-scroll-behavior="center"
                                data-scroll-offset="0" data-scroll-speed="3" data-scroll-invisible="1">Projects
                            </h2>
                            <ul id="buttons04" class="style1 buttons">
                                <?php
                                foreach ($projects as $project) {
                                ?>
                                <li>
                                    <a href="<?php echo $project['project_link'] ?>" class="button n01">
                                        <svg>
                                            <use xlink:href="#icon-49c7b76f0edfabe10e324ba1ac396f84"></use>
                                        </svg>
                                        <span class="label"><?php echo $project['project_name'] ?></span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                            <p id="text01" class="style2">My current stacks:</p>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="inner" data-onvisible-trigger="1">
                        <ul id="icons01" class="style1 icons">
                            <?php foreach ($skills as $skill) { ?>
                            <li>
                                <div id="image02" class="style2 image">
                                    <img src="<?php echo $skill['skill']; ?>" alt="Stacks" widht="50px"
                                        height="50px" />
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
                            <h2 id="text07" class="style3">Talks, workshops, articles...</h2>
                            <br><br>
                            <ul id="buttons04" class="style1 buttons">
                                <?php foreach ($others as $other) { ?>
                                <li>
                                    <a href="#modal<?php echo $other['id']; ?>"
                                    class="button n01 waves-effect waves-light btn modal-trigger"
                                    style="padding: 15px 20px; font-size: 15px; ">
                                        <span class="label"><?php echo $other['title'] ?></span>
                                    </a>
                                </li>

                                <div id="modal<?php echo $other['id']; ?>" name="modal<?php echo $other['id']; ?>"
                                    class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <h4><?php echo $other['title']; ?></h4>
                                        <img src=<?php echo $other['banner']; ?> widht="250px"
                                            height="350px" />
                                    </div>
                                    <div class="modal-footer" style="text-align:center;">
                                        <a href="<?php echo $other['banner_link']; ?>">Link: <?php echo $other['title']; ?></a>
                                    </div>
                                </div>
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
                            <h2 id="text07" class="style3">How to find about me: </h2>
                            <ul id="icons01" class="style1 icons">
                                <li><a class="n01" href="https://linkedin.com/in/<?php echo $social['linkedin']; ?>"
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
                <p id="text02"><?php echo $social['email']; ?></p>
            </div>
        </div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; height: 10vh;">
        <script type="text/javascript">
            var atOptions = {
                'key' : '64c9f95ee05a7716b801515f91ab0be6',
                'format' : 'iframe',
                'height' : 60,
                'width' : 468,
                'params' : {}
            };

            
        </script>
    </div>      
</body>
<script>
    var script = document.createElement('script');
            script.src = "//www.topcreativeformat.com/" + atOptions.key + "/invoke.js";
            script.async = true;
            document.body.appendChild(script);
    M.AutoInit();
    $(document).ready(function() {
        $('.modal').modal();
    });
</script>
</html>