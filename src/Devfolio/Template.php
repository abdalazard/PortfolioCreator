<?php
session_start();
include '../../db/Connection.php';
require_once '../../vendor/autoload.php';
include 'Devfolio.php';

$userId = $_SESSION['id']; 
$action = $_GET['action'];
$template = $_GET['template'];

if($action == "getTemplateDefault"){
    $devfolio = new Devfolio;
    $data = $devfolio->getTemplate(1, $userId);
    echo json_encode($data);
    exit();
}

if($action == "chooseTemplate"){
    $devfolio = new Devfolio;
    $devfolio->templateVisualization($template);    
    echo json_encode($filteredData);
    
    
    exit();
}
