<?php

include 'Update.php';
include '../../auth/Authentication.php';

$type = $_POST['type'];
$update = new Update;

if($type == "profile") {
    //Profile
    $foto = $_FILES['foto'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $update->setProfile($foto, $titulo, $subtitulo);
}
if($type == "project") {
    //Projects
    $nome_projeto = $_POST['nome_projeto'];
    $url = $_POST['url'];
    $update->setProjects($nome_projeto, $url);
}
if($type == "skill") {
    //Skills
    $skill = $_FILES['skill'];
    $update->setSkill($skill);
}
if($type == "others") {
    //Others
    $others = $_FILES['others'];
    $update->setOthers($others);
}
if($type == "social") {
    //Social
    $github = $_POST['github'];
    $github = $_POST['linkedin']; 
    $update->setSocial($github, $linkedin);
}
        






// header("location: ../../index0.php?msg=" . $msg);