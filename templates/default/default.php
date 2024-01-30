<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>DevFolio</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        
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
                                        <img src="<?php echo '../../' . $profile['profile']; ?>" alt="Foto" />
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
                                        <img src="<?php echo '../../' . $skill['skill']; ?>" alt="Stacks" widht="50px"
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
                                            class="button n01 waves-effect waves-light btn modal-trigger">
                                            <svg>
                                                <use xlink:href="#icon-49c7b76f0edfabe10e324ba1ac396f84"></use>
                                            </svg>
                                            <span class="label"><?php echo $other['title'] ?></span>

                                        </a>
                                    </li>

                                    <div id="modal<?php echo $other['id']; ?>" name="modal<?php echo $other['id']; ?>"
                                        class="modal modal-fixed-footer">
                                        <div class="modal-content">
                                            <h4><?php echo "Tema da palestra"; ?></h4>
                                            <img src=<?php echo '../../' . $other['banner']; ?> widht="250px"
                                                height="450px" />
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col s7">
                                                    <a href="<?php echo $other['banner_link']; ?>">Link: <?php echo $other['title']; ?></a>
                                                </div>
                                            </div>
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
                                            </svg><span class="label">LinkedIn</span>
                                        </a>
                                    </li>
                                    <li><a class="n02" href="https://github.com/<?php echo $social['github']; ?>"
                                            aria-label="GitHub"><svg>
                                                <use xlink:href="#icon-8c4b37645de3c276d895d87df51ba614"></use>
                                            </svg><span class="label">GitHub</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p id="text02"><?php echo $social['email']; ?></p>
                </div>
            </div>
    </body>
</html>
