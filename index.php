<?php
include_once 'icon/network.php';
include 'src/Devfolio/Devfolio.php';
include "db/Connection.php";
require_once (__DIR__.'/vendor/autoload.php');

$con = new Connection;

try {
    $getPort = new Devfolio;
    $getPage = $getPort->getVisualizationPage();
    $template = $getPort->getTemplate();
    $profile = $getPort->getProfile($getPage);
    $skills = $getPort->getSkills($getPage);
    $projects = $getPort->getProjects($getPage);
    $others = $getPort->getOthers($getPage);
    $social = $getPort->getContacts($getPage);

    $templatePath = "templates/" . $template . "/" . $template;

    include $templatePath . '.php';
    echo "<style>
            body {
                display: none;
            }
        </style>";

    echo "<link rel='stylesheet' type='text/css' href='".$templatePath.".css'>";
    echo '<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />';
    echo '<link href="https://fonts.googleapis.com/css2?display=swap&family=Inter:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet" type="text/css" />';
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>';
    echo "<script src='".$templatePath.".js'></script>";
    echo "<script>
            $(window).on('load', function() {
                $('body').fadeIn();
            });
        </script>";

} catch (Exception $e) {
    $msg = "Erro: " . $e->getMessage() . "\nYou don't have anything registered!";
    header("location: nodevfolio.php?msg=" . $msg);
}
