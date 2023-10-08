<?php
session_start();
include '../../db/Connection.php';

include 'Portfolio.php';

$userId = $_GET['userId'];
$method = $_GET['action'];

if($method == "getProfile"){
    $portfolio = new Portfolio;
    $data = $portfolio->getProfile($userId);
    echo json_encode($data);
    exit();  
}

if($method == "getSkills"){
    $portfolio = new Portfolio;
    $data = $portfolio->getSkills($userId);
    echo json_encode($data);
    exit();  
}

if($method == "getProjects"){
    $portfolio = new Portfolio;
    $data = $portfolio->getProjects($userId);
    echo json_encode($data);
    exit();  
}

if($method == "getOthers"){
    $portfolio = new Portfolio;
    $data = $portfolio->getOthers($userId);
    echo json_encode($data);
    exit();  
}
if($method == "getContacts"){
    $portfolio = new Portfolio;
    $data = $portfolio->getSocial($userId);
    echo json_encode($data);
    exit();  
}
?>