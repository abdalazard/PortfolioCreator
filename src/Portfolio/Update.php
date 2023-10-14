<?php
session_start();
include '../../db/Connection.php';

include 'Portfolio.php';

$userId = $_SESSION['id']; 
$action = $_POST['action'];

$profile = $_FILES['profile'] ?? null;

$data = $_POST['data'] ?? null;

$dir = "../../images/users/";

if($action == "updateProfilePic"){

    $portfolio = new Portfolio;
    $column = "profile";
    $pathInfo = $portfolio->setImage($profile, $column, $dir);
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$pathInfo."' WHERE `id_user` LIKE '".$userId."'";  

    if ($portfolio->dataBase($updateProfile)) {
        return 'Imagem do profile atualizado com sucesso!';
    }
    return "Erro ao atualizado a imagem do profile!";
    
}

if($action == "updateProfileTitle"){

    $portfolio = new Portfolio;
    $column = "titulo";
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$data."' WHERE `id_user` LIKE '".$userId."'";  

    if ($portfolio->dataBase($updateProfile)) {
        return 'Titulo do profile atualizado com sucesso!';
    }
    return "Erro ao atualizado o Titulo do profile!";
    
}

if($action == "updateProfileSubtitle"){

    $portfolio = new Portfolio;
    $column = "subtitulo";
    $updateProfile = "UPDATE `profile` SET ".$column." = '".$data."' WHERE `id_user` LIKE '".$userId."'";  

    if ($portfolio->dataBase($updateProfile)) {
        return 'Subtitulo do profile atualizado com sucesso!';
    }
    return "Erro ao atualizado o Subtitulo do profile!";
    
}

