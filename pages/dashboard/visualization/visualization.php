<?php

include "../../../db/Connection.php";
include '../../../src/Devfolio/Devfolio.php';
include '../../../auth/Authentication.php';
require_once ('../../../vendor/autoload.php');
include_once '../../../icon/network.php';

$con = new Connection;

$userId =  $_SESSION['id'];

try {
   
    $getPort = new Devfolio;
    $getPage = $getPort->getVisualizationPage();
    if(isset($_GET['newTemplate'])) {
        $newTemplate = json_decode($_GET['newTemplate'], true);
        $template = $newTemplate;
    } else {
        $template = $getPort->templateVisualization(null, $userId);
    }
    $templates = $getPort->getTemplates();
    $profile = $getPort->getProfile($getPage);
    $profile['profile'] = "../../../" . $profile['profile'];
    $skills = $getPort->getSkills($getPage);
    foreach ($skills as $key => $subarray) {
        $skills[$key]['skill'] = "../../../" . $subarray['skill'];
    }
    $projects = $getPort->getProjects($getPage);
    foreach ($projects as $key => $subarray) {
        $projects[$key]['screenshot'] = "../../../" . $subarray['screenshot'];
    }
    $others = $getPort->getOthers($getPage);
    foreach ($others as $key => $subarray) {
        $others[$key]['banner'] = "../../../" . $subarray['banner'];
    }
    $social = $getPort->getContacts($getPage);

    $templatePath = "../../../templates/" . $template['name'] . "/" . $template['name'];

    $templateId = $template['id'];

    include $templatePath . '.php';
    include '../navbar.php';

echo "<head>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='".$templatePath.".css'>
    <link type='text/css' rel='stylesheet' href='../../../materialize/css/materialize.min.css' media='screen,projection' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
    <link href='https://fonts.googleapis.com/css2?display=swap&family=Inter:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600' rel='stylesheet' type='text/css' />
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
    <script src='".$templatePath.".js'></script>
    <script src='../navbar.js'></script>
    <link rel='stylesheet' type='text/css' href='../../../styles2.css' />
    <link rel='stylesheet' type='text/css' href='visualization.css' />
    <title>Portfolio Creator</title>
    </head>
    <style>
        body {
            margin-top: 100px;
        }
    </style>
    <script>
    $(document).ready(function() {

        var urlParams = new URLSearchParams(window.location.search);
        var message = urlParams.get('templateCreated');

        if (message) {
            M.toast({html: message});
        }

        $('#backButton').on('click', function() {
            window.history.back();
        });

        $('#chooseTemplate').on('click', (function(e) {
            e.preventDefault();
            var template = $('#template').val();
            $.ajax({
                url: '../../../src/Devfolio/Template.php',
                type: 'GET',
                data: {
                    template: template,
                    action: 'chooseTemplate'
                },
                success: function(data) {
                console.log(data);
                    let newTemplate = JSON.parse(data);
                    let url = new URL(window.location.href);
                    url.searchParams.set('newTemplate', JSON.stringify(newTemplate));
                    window.location.href = url.href;
                    
                }, error : function(error) {
                    console.log('seu retorno deu erro: ', error);
                }
            });
        }));

        $('#publish').on('click', function(event) {
            event.preventDefault();

            var formStatus = new FormData();
            formStatus.append('status', 1);
            formStatus.append('template', $templateId);
            formStatus.append('action', 'setStatus');
    
            $.ajax({
                url: '../../../src/Devfolio/Create/Status.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formStatus,
                success: function(data) {
                    let statusMsg = 'Your Devfolio project is published!';
                    location.href = '../dashboard.php?statusMsg='+statusMsg;                  
                },
                error: function(error) {
                    console.log('Publish button not good!')
                }
            });
        });
    });
    </script>";

} catch (Exception $e) {
    $msg = "Erro: " . $e->getMessage() . "\nYou don't have anything registered!";
    header("location: nodevfolio.php?msg=" . $msg);
}

