<?php
session_start();
include '../../db/Connection.php';
require_once '../../vendor/autoload.php';

include 'Devfolio.php';

$userId = $_SESSION['id']; 
$action = $_GET['action'];
$id = $_GET['id'] ? $_GET['id'] : null;
$dir = $_GET['dir'] ?? null;

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
    $directory = '../../'.$dir;
    if($devfolio->deleteImages($directory)) {
        $deleteProject = "DELETE FROM `".$table."` WHERE id LIKE '".$id."'";  
        if ($devfolio->dataBase($deleteProject)) {
            echo 'Project deleted successfully!';
        }
    }    
    echo "Problems to attempt to delete project.";
    exit();
}

if($action == "deleteEvent"){

    $devfolio = new Devfolio;
    $table = "others";
    $directory = '../../'.$dir;
    if($devfolio->deleteImages($directory)) {
        $deleteOthers = "DELETE FROM `".$table."` WHERE id LIKE '".$id."'";  
        if ($devfolio->dataBase($deleteOthers)) {
            echo 'Event deleted successfully!';
        }
    }    
    echo "Problems to attempt to delete event.";
    exit();
}

if($action == "deletePortfolio"){
   
    try {
        $devfolio = new Devfolio;

        $directory = '../../images/users/'.$_SESSION['user'].'_folder/';

        $devfolio->deleteImages($directory);

        $deleteOthers = "DELETE FROM profile WHERE id_user LIKE '".$userId."'";  
        if ($devfolio->dataBase($deleteOthers)) {
            echo 'Profile deleted successfully!';
        }
        $deleteSkill = "DELETE FROM skills WHERE id_user LIKE '".$userId."'";  
        if ($devfolio->dataBase($deleteSkill)) {
            echo 'Skill deleted successfully!';
        }
        
        $deleteProject = "DELETE FROM projects WHERE id_user LIKE '".$userId."'";  
        if ($devfolio->dataBase($deleteProject)) {
            echo 'Project deleted successfully!';
        }

        $deleteOthers = "DELETE FROM others WHERE id_user LIKE '".$userId."'";  
        if ($devfolio->dataBase($deleteOthers)) {
            echo 'Event deleted successfully!';
        }

        $deleteOthers = "DELETE FROM contacts WHERE id_user LIKE '".$userId."'";  
        if ($devfolio->dataBase($deleteOthers)) {
            echo 'Contacts deleted successfully!';
        }

        $deleteState =  "DELETE FROM state WHERE id_user LIKE '".$userId."'";
        $devfolio->dataBase($deleteState);
        
        $createNewState = "INSERT INTO state VALUES(null, '0','0','0','0','0', '" . $userId . "')";
        $devfolio->dataBase($createNewState);

        $updateStatus = "UPDATE status SET status = '0' WHERE id_user LIKE '".$userId."'";
        $devfolio->dataBase($updateStatus);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit();
}
