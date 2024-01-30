<?php
session_start();
include '../../db/Connection.php';
require_once '../../vendor/autoload.php';
include 'Devfolio.php';

$userId = $_SESSION['id']; 
$action = $_GET['action'];

if($action == "getTemplateDefault"){
    $devfolio = new Devfolio;
    $data = $devfolio->getTemplate();
    echo json_encode($data);
    exit();
}