<?php
include 'src/Devfolio/Devfolio.php';
include "db/Connection.php";
require_once (__DIR__.'/vendor/autoload.php');

$con = new Connection;

try {
    $getPort = new Devfolio;
    $getStatus = $getPort->getStatus(1);
    if(!$getStatus || $getStatus['status'] == 0) {
        $msg = "You don't have anything registered!";
        header("location: nodevfolio.php?msg=" . $msg);
    }
    $getPage = $getPort->getVisualizationPage();
    $template = $getPort->getTemplate(1);
    $profile = $getPort->getProfile($getPage);
    $skills = $getPort->getSkills($getPage);
    $projects = $getPort->getProjects($getPage);
    $others = $getPort->getOthers($getPage);
    $social = $getPort->getContacts($getPage);

    $templatePath = "templates/" . $template['name'] . "/" . $template['name'];
    include_once 'icon/network.php';
    include $templatePath . '.php';
    
    echo "<head>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='".$templatePath.".css'>
    <link type='text/css' rel='stylesheet' href='materialize/css/materialize.min.css' media='screen,projection' />
    <link href='https://fonts.googleapis.com/css2?display=swap&family=Inter:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600' rel='stylesheet' type='text/css' />
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
    <script src='".$templatePath.".js'></script>
    <title>Portfolio</title>
    </head>
    <script>
            $(window).on('load', function() {
                $('body').fadeIn();
            });
            $(document).ready(function(){
                $('.modal').modal();
            });
        </script>";
        
} catch (Exception $e) {
    $msg = "Erro: " . $e->getMessage() . "\nYou don't have anything registered!";
    header("location: nodevfolio.php?msg=" . $msg);
}
