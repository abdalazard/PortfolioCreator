<?php
include '../../../db/Connection.php';
require_once '../../../vendor/autoload.php';
include '../Devfolio.php';

session_start();
$userId = $_SESSION['id'];

//Skills
$skills = $_FILES['skill'];
$dir = "../../../images/users/";

if($skills) {
    try{
        $devfolio = new Devfolio;

        $pathSkills = $devfolio->setImages($skills, 'skills', $dir);
        foreach ($pathSkills as $skill) {
            $newSkill = "INSERT INTO skills VALUES(null, '" . $skill . "', '" . $userId . "')";
            $devfolio->dataBase($newSkill);
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage() . "\nProblems to attempt to save some data in this skills list";
    }
}

?>
