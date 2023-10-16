<?php
session_start();
include '../../../db/Connection.php';
include '../Devfolio.php';

$userId = $_SESSION['id'];

$profile = $_FILES['profile'];
$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$dir = "../../../images/users/";

$devfolio = new Devfolio;

$pathInfo = $devfolio->setImage($profile, 'profile', $dir);
$newProfile = "INSERT INTO profile VALUES(null, '" . $pathInfo . "', '" . $title . "', '" . $subtitle . "', '" . $userId . "')";

if ($devfolio->dataBase($newProfile)) {
    return 'Profile created successfully!';
}
return "Problems to attempt to create this profile!";
