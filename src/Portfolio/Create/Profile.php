<?php
include '../../../db/Connection.php';

include '../Portfolio.php';

session_start();
$userId = $_SESSION['id'];

//Profile
$foto = $_FILES['profile'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];

if($foto && $titulo) {
    $portfolio = new Portfolio;

    if ($portfolio->moreThanOne($userId) == true) {
        return "Dados de perfil já existentes";
    } else {        

        $pathInfo = $portfolio->setImage($foto, 'profile');
        $newProfile = "INSERT INTO profile VALUES(null, '" . $pathInfo . "', '" . $titulo . "', '" . $subtitulo . "', '" . $userId . "')";

        if ($portfolio->dataBase($newProfile)) {
            return 'Profile gravado com sucesso!';
        }
        return "Erro ao gravar o perfil!";
    }
}