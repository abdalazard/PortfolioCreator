<?php
include '../../db/Connection.php';

session_start();

//Profile
$foto = $_FILES['foto'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];

//Skills
$skill = $_FILES['skill'];

//Projects
$project_name = $_POST['nome_projeto'];
$url_project = $_POST['url_projeto'];

//Others
$banner = $_FILES['others'];
$url_banner = $_POST['url_others'];

//Social
$github = $_POST['github'];
$linkedin = $_POST['linkedin'];

$userId = $_SESSION['id'];

include 'Portfolio.php';
$portfolio = new Portfolio;
    
if ($portfolio->moreThanOne($userId) == true) {

    $msg = 'Erro, já existe este portfolio';

    header("location: ../../pages/dashboard/dashboard.php?msg=" . $msg);
} else {
    //à substituir
    if (!$portfolio->store($foto, $titulo, $subtitulo, $skill, $project_name, $url_project, $banner, $url_banner, $github, $linkedin, $userId)) {
        $msg = "Erro ao gravar os dados!";
    }
    $msg = "Dados de portfolio gravados com sucesso!";

    header("location: ../../pages/dashboard/visualization.php?msg=" . $msg);
}