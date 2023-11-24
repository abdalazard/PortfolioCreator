<?php
include '../../../db/Connection.php';
require_once '../../../vendor/autoload.php';

include '../Devfolio.php';

session_start();
$userId = $_SESSION['id'];

//Social
$email = $_POST['email'];
$github = $_POST['github'];
$linkedin = $_POST['linkedin'];

try{
    //Social
    $portfolio = new Devfolio;

    $newSocial = "INSERT INTO contacts VALUES(null, '".$email."','" . $github . "', '" . $linkedin . "', '" . $userId . "')";
    $portfolio->dataBase($newSocial);
    return 'Contacts saved sucessfully!';            
   
} catch (PDOException $e) {
    return "Error: " . $e->getMessage() . "\nProblems to attempt to save some data in this contacts section.";
}