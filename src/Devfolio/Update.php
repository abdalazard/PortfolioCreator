<?php
session_start();
include '../../db/Connection.php';
require_once '../../vendor/autoload.php';
include 'Devfolio.php';

//Utils
$userId = $_SESSION['id']; 
$action = $_POST['action'];
$dir = "../../images/users/";

//Profile
$profile = $_FILES['profile'] ?? null;
$data = $_POST['data'] ?? null;

//Skills
$skills = $_FILES['skill'] ?? null;

//Projects
$screenshot = $_FILES['screenshot'] ?? null;
$projectNameInput = $_POST['project_name'];
$projectLink = $_POST['project_link'];

//Others
$banner = $_FILES['banner'];
$others_title = $_POST['others_title'];
$others_link = $_POST['others_link'];

//Contacts
$email = $_POST['email'];
$github = $_POST['github'];
$likedin = $_POST['likedin'];

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
            $pathProject = $devfolio->setImageProject($screenshot, $column, $dir);
            $updateProject = "INSERT INTO projects VALUES(null, '".$pathProject."', '" . $projectNameInput . "', '" . $projectLink . "', '" . $userId . "')";

            $devfolio->dataBase($updateProject);
            echo "Project updated successfully!s";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nProblems to attempt to update project.";
        }
    }
}

if($action == "updateOthers") {
    
    if($others_title) {
        try{
            $devfolio = new Devfolio;
            $column = "others";
            $pathOthers = $devfolio->setImageOthers($banner, $column, $dir);
            $updateOthers = "INSERT INTO others VALUES(null, '".$others_title."', '" . $pathOthers . "', '" . $others_link . "', '" . $userId . "')";

            $devfolio->dataBase($updateOthers);
            echo "Event updated successfully!s";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nProblems to attempt to update event.";
        }
    }
}

if($action == "updateEmail") {
    
    if($data) {
        try{
            $devfolio = new Devfolio;
            $updateEmail = "UPDATE `contacts` SET email = '".$data."' WHERE `id_user` LIKE '".$userId."'";

            $devfolio->dataBase($updateEmail);
            echo "Email updated successfully!s";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nProblems to attempt to update email.";
        }
    }
}

if($action == "updateGithub") {
    
    if($data) {
        try{
            $devfolio = new Devfolio;
            $updateGithub = "UPDATE `contacts` SET github = '".$data."' WHERE `id_user` LIKE '".$userId."'";

            $devfolio->dataBase($updateGithub);
            echo "Github updated successfully!s";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nProblems to attempt to update github.";
        }
    }
}

if($action == "updateLinkedin") {
    
    if($data) {
        try{
            $devfolio = new Devfolio;
            $updateLinkedin = "UPDATE `contacts` SET linkedin = '".$data."' WHERE `id_user` LIKE '".$userId."'";

            $devfolio->dataBase($updateLinkedin);
            echo "Linkedin updated successfully!s";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nProblems to attempt to update linkedin.";
        }
    }
}
