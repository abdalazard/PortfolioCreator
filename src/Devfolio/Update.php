<?php
session_start();
include '../../db/Connection.php';

include 'Devfolio.php';

$userId = $_SESSION['id']; 
$action = $_POST['action'];

$profile = $_FILES['profile'] ?? null;
$data = $_POST['data'] ?? null;

$skills = $_FILES['skill'] ?? null;

$screenshot = $_FILES['screenshot'] ?? null;
$projectNameInput = $_POST['project_name'];
$projectLink = $_POST['project_link'];

$dir = "../../images/users/";

if($action == "updateProfilePic"){

    $devfolio = new Devfolio;
    $column = "profile";
    $pathInfo = $devfolio->setImage($profile, $column, $dir);
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$pathInfo."' WHERE `id_user` LIKE '".$userId."'";  

    if ($devfolio->dataBase($updateProfile)) {
        echo 'Profile picture updated successfully!';
    } else {
        echo "Problems to attempt to update profile picture!";
    }
    
}

if($action == "updateProfileTitle"){

    $devfolio = new Devfolio;
    $column = "title";
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$data."' WHERE `id_user` LIKE '".$userId."'";  

    if ($devfolio->dataBase($updateProfile)) {
        echo 'Profile title updated successfully!';
    } else {
        echo "Problems to attempt to update profile title!";    
    }
}

if($action == "updateProfileSubtitle"){

    $devfolio = new Devfolio;
    $column = "subtitle";
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$data."' WHERE `id_user` LIKE '".$userId."'";  

    if ($devfolio->dataBase($updateProfile)) {
        echo 'Profile subtitle updated successfully';
    } else {
        echo "Problems to attempt to update profile subtitle!";    
    }
}

if($action == "updateSkills") {
    
    if($skills) {
        try{
            $devfolio = new Devfolio;
            $column = "skills";
            $pathSkills = $devfolio->setImages($skills, 'skills', $dir, true);
            foreach ($pathSkills as $skill) {
                $newSkill = "INSERT INTO skills VALUES(null, '" . $skill . "', '" . $userId . "')";

                $devfolio->dataBase($newSkill);
            }
            echo "Skill updated successfully!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nProblems to attempt to update skills.";
        }
    }
}

if($action == "updateProject") {
    
    if($projectNameInput) {
        try{
            $devfolio = new Devfolio;
            $column = "projects";
            $pathProject = $devfolio->setImage($screenshot, $column, $dir);
            $updateProject = "INSERT INTO projects VALUES(null, '".$pathProject."', '" . $projectNameInput . "', '" . $projectLink . "', '" . $userId . "')";

            $devfolio->dataBase($updateProject);
            echo "Project updated successfully!s";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nProblems to attempt to update project.";
        }
    }
}
