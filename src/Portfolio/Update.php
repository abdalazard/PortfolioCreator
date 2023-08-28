<?php
session_start();
include '../../db/Connection.php';

$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];

$github = $_POST['github'];
$linkedin = $_POST['linkedin'];

$userId = $_SESSION['id'];

echo $userId;
