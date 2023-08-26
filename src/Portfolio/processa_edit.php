<?php

include 'Edit.php';
include '../../auth/Authentication.php';

$msg = [];

$edit = new Edit;
if(isset($_FILES['foto']) && isset($_POST['titulo']) && isset($_POST['subtitulo'])){
    $edit->setProfile($_FILES['foto'], $_POST['titulo'], $_POST['subtitulo']);
} else {
    $msg = "Erro com os dados do perfil!\n";
}
if(isset($_POST['nome_projeto']) && isset($_POST['url'])){
    $edit->setProject($_FILES['foto'], $_POST['url']);
} else {
    $msg = "Erro com os dados do projeto!\n";
}
if(isset($_FILES['skill'])){
    $edit->setSkill($_FILES['foto']);
} else {
    $msg = "Erro com os dados das habilidades!\n";
}
if(isset($_FILES['others'])){
    $edit->setOthers($_FILES['others']);
} else {
    $msg = "Erro com os dados de outras tarefas!\n";
}
if(isset($_POST['github']) && isset($_POST['linkedin'])){
    $edit->setSocial($_POST['github'], $_POST['linkedin']);
} else {
    $msg = "Erro com os dados das redes sociais!\n";

}