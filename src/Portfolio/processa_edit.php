<?php

include 'Edit.php';

$edit = new Edit;
if(isset($_FILES['foto']) && isset($_POST['titulo']) && isset($_POST['subtitulo'])){
    $edit->setProfile($_FILES['foto'], $_POST['titulo'], $_POST['subtitulo']);
}
if(isset($_POST['nome_projeto']) && isset($_POST['url'])){
    $edit->setProject($_FILES['foto'], $_POST['url']);
}
if(isset($_FILES['skill'])){
    $edit->setSkill($_FILES['foto']);
}
if(isset($_FILES['others'])){
    $edit->setOthers($_FILES['others']);
}
if(isset($_POST['github']) && isset($_POST['linkedin'])){
    $edit->setSocial($_FILES['others']);
}