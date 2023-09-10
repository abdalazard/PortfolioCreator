<?php
include '../../db/Connection.php';

session_start();

//Profile
$profile = $_FILES['profile'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];

//Skills
$skills = $_FILES['skill'];

//Projects
$previa = $_FILES['previa'];
$project_name = $_POST['nome_projeto'];
$url_project = $_POST['url_projeto'];

//Others
$tema = $_POST['tema'];
$banner = $_FILES['others'];
$url_banner = $_POST['url_others'];

//Social
$email = $_POST['email'];
$github = $_POST['github'];
$linkedin = $_POST['linkedin'];

$userId = $_SESSION['id'];

include 'Portfolio.php';
$portfolio = new Portfolio;

if ($portfolio->moreThanOne($userId) == true) {

    $msg = 'Erro, já existe este portfolio';
    header("location: ../../pages/portfolio/create.php?msg=" . $msg);
} else {
    //à substituir
    if (!$portfolio->store(
        $profile,
        $titulo,
        $subtitulo,
        $skills,
        $previa,
        $project_name,
        $url_project,
        $tema,
        $banner,
        $url_banner,
        $github,
        $linkedin,
        $email,
        $userId
    )) {
        $msg = "Erro ao gravar os dados!";
    }
    $msg = "Dados de portfolio gravados com sucesso!";

    header("location: ../../pages/dashboard/visualization.php?msg=" . $msg);
}
