<?php
include '../../../db/Connection.php';
require_once '../../../vendor/autoload.php';
include '../Devfolio.php';

session_start();
$userId = $_SESSION['id'];

//Others
$title = $_POST['title'];
$banner = $_FILES['banner'];
$link = $_POST['link'];
$dir = "../../../images/users/";

if($banner && $link) {
    try{
        $devfolio = new Devfolio;

        $pathOthers = $devfolio->setImage($banner, 'others', $dir);
        $newOthers =  "INSERT INTO others VALUES(null, '".$title."', '" . $pathOthers . "', '" . $link . "', '" . $userId . "')";
        $devfolio->dataBase($newOthers);
        return 'Link registered successfully!';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\nProblemas to attempt to save some data from external links";
    }
}