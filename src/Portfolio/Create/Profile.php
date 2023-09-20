<?php
include '../../db/Connection.php';

include 'Portfolio.php';
$portfolio = new Portfolio;

session_start();
$userId = $_SESSION['id'];

//Profile
$foto = $_FILES['profile'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];

if($foto && $titulo) {
    if ($portfolio->moreThanOne($userId) == true) {
        $msg = "Dados de perfil já existentes";

    } else {
        
        $msg = "Dados de perfil gravados com sucesso!";

        $pathInfo = $this->setImage($foto, 'info');
        $newProfile = "INSERT INTO info VALUES(null, '" . $pathInfo . "', '" . $titulo . "', '" . $subtitulo . "', '" . $userId . "')";
        
        if ($this->dataBase($newProfile)) {
            return 'Projeto gravado com sucesso!';

        }
        return "Erro ao gravar o perfil!";

    }
}