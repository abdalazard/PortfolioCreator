<?php
session_start();
include '../../db/Connection.php';
include '../Portfolio.php';

$userId = $_GET['userId'];

$portfolio = new Portfolio;

$pathInfo = $portfolio->setImage($foto, 'profile');
$newProfile = "INSERT INTO profile VALUES(null, '" . $pathInfo . "', '" . $titulo . "', '" . $subtitulo . "', '" . $userId . "')";

if ($portfolio->dataBase($newProfile)) {
    return 'Profile gravado com sucesso!';
}
return "Erro ao gravar o perfil!";
