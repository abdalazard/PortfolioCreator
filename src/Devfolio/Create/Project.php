<?php
include '../../../db/Connection.php';

include '../Devfolio.php';

session_start();
$userId = $_SESSION['id'];

$projectNameInput = $_POST['projectNameInput'];
$screenShotInput = $_FILES['screenShotInput'];
$projectLinkInput = $_POST['projectLinkInput'];
$dir = "../../../images/users/";

if($screenShotInput && $projectNameInput) {
    $portfolio = new Devfolio;

    try{
        $pathProjects = $portfolio->setImage($screenShotInput, 'projects', $dir);
        $newProject = "INSERT INTO projects VALUES(null, '".$pathProjects."', '" . $projectNameInput . "', '" . $projectLinkInput . "', '" . $userId . "')";
        $saveProject = $portfolio->dataBase($newProject);
        if (!$saveProject) {
            return  "Problems to attempt to save this project!";
        }
        return 'Project saved sucessfully!';            
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\nProblems to attempt to save some data from extenal links in this project";
    }
    
}