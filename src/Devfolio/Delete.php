<?php
session_start();
include '../../db/Connection.php';

include 'Devfolio.php';

$userId = $_SESSION['id']; 
$action = $_GET['action'];
$id = $_GET['id'];
$dir = $_GET['dir'] ?? NULL;

if($action == "deleteSkill"){

    $devfolio = new Devfolio;
    $table = "skills";

    $deleteImage = $devfolio->deleteImages('../../'.$dir);
    if($deleteImage) {
        $deleteSkill = "DELETE FROM `".$table."` WHERE id LIKE '".$id."'";  
        if ($devfolio->dataBase($deleteSkill)) {
            echo 'Skill deleted successfully!';
        }
    }    
    echo "Problems to attempt to delete skill.";
    exit();
}

if($action == "deleteProject"){

    $devfolio = new Devfolio;
    $table = "projects";

    $deleteImage = $devfolio->deleteImages('../../'.$dir);
    if($deleteImage) {
        $deleteSkill = "DELETE FROM `".$table."` WHERE id LIKE '".$id."'";  
        if ($devfolio->dataBase($deleteSkill)) {
            echo 'Project deleted successfully!';
        }
    }    
    echo "Problems to attempt to delete project.";
    exit();
}

