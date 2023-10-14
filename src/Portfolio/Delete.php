<?php
session_start();
include '../../db/Connection.php';

include 'Portfolio.php';

$userId = $_SESSION['id']; 
$action = $_GET['action'];
$id = $_GET['id'];
$dir = $_GET['path'] ?? NULL;

if($action == "deleteSkill"){

    $portfolio = new Portfolio;
    $table = "skills";

    $deleteImage = $portfolio->deleteImages('../../'.$dir);
    if($deleteImage) {
        $deleteSkill = "DELETE FROM `".$table."` WHERE id LIKE '".$id."'";  
        if ($portfolio->dataBase($deleteSkill)) {
            echo 'Skill excluída com sucesso!';
        }
    }    
    echo "Erro ao excluir uma skill do profile!";
    exit();
}

