<?php
session_start();
include '../../db/Connection.php';

include 'Portfolio.php';

$userId = $_SESSION['id']; 
$action = $_POST['action'];

$profile = $_FILES['profile'] ?? null;

$data = $_POST['data'] ?? null;
$skills = $_FILES['skill'];

$dir = "../../images/users/";

if($action == "updateProfilePic"){

    $portfolio = new Portfolio;
    $column = "profile";
    $pathInfo = $portfolio->setImage($profile, $column, $dir);
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$pathInfo."' WHERE `id_user` LIKE '".$userId."'";  

    if ($portfolio->dataBase($updateProfile)) {
        echo 'Imagem do profile atualizado com sucesso!';
    }
    echo "Erro ao atualizado a imagem do profile!";
    
}

if($action == "updateProfileTitle"){

    $portfolio = new Portfolio;
    $column = "titulo";
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$data."' WHERE `id_user` LIKE '".$userId."'";  

    if ($portfolio->dataBase($updateProfile)) {
        echo 'Titulo do profile atualizado com sucesso!';
    }
    echo "Erro ao atualizado o Titulo do profile!";
    
}

if($action == "updateProfileSubtitle"){

    $portfolio = new Portfolio;
    $column = "subtitulo";
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$data."' WHERE `id_user` LIKE '".$userId."'";  

    if ($portfolio->dataBase($updateProfile)) {
        echo 'Subtitulo do profile atualizado com sucesso!';
    }
    echo "Erro ao atualizado o Subtitulo do profile!";
    
}
if($action == "updateSkills") {
    
    if($skills) {
        try{
            $portfolio = new Portfolio;
            $column = "skills";
            $pathSkills = $portfolio->setImages($skills, 'skills', $dir, true);
            foreach ($pathSkills as $skill) {
                // $updateSkills = "UPDATE `skills` SET ".$column." = '".$data."' WHERE `id_user` LIKE '".$userId."'";  
                $newSkill = "INSERT INTO skills VALUES(null, '" . $skill . "', '" . $userId . "')";

                $portfolio->dataBase($newSkill);
            }
            echo "Habilidades atualizadas com sucesso";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nErro ao atualizar alguns dos dados de habilidades do portfolio.";
        }
    }
}
