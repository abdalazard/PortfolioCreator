<?php
session_start();
include '../../db/Connection.php';
require_once '../../vendor/autoload.php';
include 'Devfolio.php';

$userId = $_SESSION['id']; 
$action = $_GET['action'];

if($action == "getTemplate"){
    $devfolio = new Devfolio;
    $data = $devfolio->getTemplate($userId);
    echo json_encode($data);
    exit();
}

if($action == "getstate"){
    $devfolio = new Devfolio;
    $data = $devfolio->getState($userId);
    echo json_encode($data);
    exit();
}

if($action == "getStatus"){
    $devfolio = new Devfolio;
    $data = $devfolio->getStatus($userId);
    echo json_encode($data);
    exit();
}

if($action == "getProfile"){
    $devfolio = new Devfolio;
    $data = $devfolio->getProfile($userId);
    echo json_encode($data);
    exit();  
}

if($action == "getSkills"){
    $devfolio = new Devfolio;
    $data = $devfolio->getSkills($userId);
    echo json_encode($data);
    exit();  
}

if($action == "getProjects"){
    $devfolio = new Devfolio;
    $data = $devfolio->getProjects($userId);
    echo json_encode($data);
    exit();  
}

if($action == "getOthers"){
    $devfolio = new Devfolio;
    $data = $devfolio->getOthers($userId);
    echo json_encode($data);
    exit();  
}
if($action == "getContacts"){
    $devfolio = new Devfolio;
    $data = $devfolio->getContacts($userId);
    echo json_encode($data);
    exit();  
}

?>