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
    $template = $getPort->templateVisualization();
    $templates = $getPort->getTemplates();
    $profile = $getPort->getProfile($getPage);
    $skills = $getPort->getSkills($getPage);
    $projects = $getPort->getProjects($getPage);
    $others = $getPort->getOthers($getPage);
    $social = $getPort->getContacts($getPage);

    $templatePath = "../../templates/" . $template['name'] . "/" . $template['name'];

    include $templatePath . '.php';
    include 'navbar.php';

    echo "<style>
            body {
                display: none;
            }
        </style>";
    echo "<link rel='stylesheet' type='text/css' href='".$templatePath.".css'>
    <link type='text/css' rel='stylesheet' href='../../materialize/css/materialize.min.css' media='screen,projection' />
    <link href='https://fonts.googleapis.com/css2?display=swap&family=Inter:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600' rel='stylesheet' type='text/css' />
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
    <script src='".$templatePath.".js'></script>
    <script src='visualization.js'></script>
    <link rel='stylesheet' type='text/css' href='visualization.css' />";

    echo "<script>
            $(window).on('load', function() {
                $('body').fadeIn();
            });

            $('#chooseTemplate').on('click', (function(e) {
                e.preventDefault();
                var template = $('#template').val();
                $.ajax({
                    url: '../../src/Devfolio/Template.php',
                    type: 'GET',
                    data: {
                        template: template,
                        action: 'chooseTemplate'
                    },
                    success: function(data) {
                        let newTemplate = JSON.parse(data);
                        console.log('new template:', newTemplate)
                    }, error : function(error) {
                        console.log('seu retorno deu erro: ', error);
                    }
                });
            }));
        </script>";


} catch (Exception $e) {
    $msg = "Erro: " . $e->getMessage() . "\nYou don't have anything registered!";
    header("location: nodevfolio.php?msg=" . $msg);
}

