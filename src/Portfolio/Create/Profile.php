<?php
session_start();
include '../../../db/Connection.php';
include '../Portfolio.php';

$userId = $_SESSION['id'];

$profile = $_FILES['profile'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$dir = "../../../images/users/";

$portfolio = new Portfolio;

$pathInfo = $portfolio->setImage($profile, 'profile', $dir);
$newProfile = "INSERT INTO profile VALUES(null, '" . $pathInfo . "', '" . $titulo . "', '" . $subtitulo . "', '" . $userId . "')";

if ($portfolio->dataBase($newProfile)) {
    return 'Profile gravado com sucesso!';
}
return "Erro ao gravar o perfil!";
