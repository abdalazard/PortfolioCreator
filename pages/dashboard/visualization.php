<?php

include "../../db/Connection.php";

include '../../src/Devfolio/Devfolio.php';
include '../../auth/Authentication.php';

require_once ('../../vendor/autoload.php');
include_once '../../icon/network.php';

$con = new Connection;

try {
    $userId = $_SESSION['id'];
    $getPort = new Devfolio;
    $getPage = $getPort->getVisualizationPage();
    $template = $getPort->getTemplate();
    $profile = $getPort->getProfile($getPage);
    $skills = $getPort->getSkills($getPage);
    $projects = $getPort->getProjects($getPage);
    $others = $getPort->getOthers($getPage);
    $social = $getPort->getContacts($getPage);

    $templatePath = "../../templates/" . $template . "/" . $template;

    include $templatePath . '.php';

    echo "<link rel='stylesheet' type='text/css' href='".$templatePath.".css'>";
    echo '<link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css" media="screen,projection" />';
    echo '<link href="https://fonts.googleapis.com/css2?display=swap&family=Inter:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet" type="text/css" />';
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>';
    echo "<script src='".$templatePath.".js'></script>";
    
    echo "<nav style='position: fixed; top: 0; width: 100%; z-index: 100;'>
            <div class='nav-wrapper black'>
                <ul id='nav-mobile' class='left hide-on-med-and-down'>
                    <li><a href='../../admin.php'>Home</a></li>
                </ul>
                <ul id='nav-mobile' class='left hide-on-med-and-down'>
                    <li><a href='#'>Change Layout(soon)</a></li>
                </ul>
                <ul class='right'>
                    <li><a class='waves-effect waves-light btn green modal-trigger' href='#' id='publish'>Publish</a>
                    </li>
                </ul>
                <ul class='right'>
                    <li><a class='waves-effect waves-light btn black modal-trigger' id='backButton' href='#'>Go back</a>
                    </li>
                </ul>
            </div>
        </nav>";

} catch (Exception $e) {
    $msg = "Erro: " . $e->getMessage() . "\nYou don't have anything registered!";
    header("location: nodevfolio.php?msg=" . $msg);
}

