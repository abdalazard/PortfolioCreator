<?php
session_start();
include '../../../db/Connection.php';
require_once '../../../vendor/autoload.php';
include '../Devfolio.php';

$userId = $_SESSION['id']; 
$action = $_POST['action'];
$template = $_POST['template'] ?? null;

if($action == "createTemplate") {
    $template_name = $_POST['template_name'];
    $devfolio = new Devfolio;
    $data = $devfolio->createTemplate($template_name, $userId);
    echo json_encode($data);
    exit();
}
