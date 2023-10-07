<?php
include '../../../db/Connection.php';

include '../Portfolio.php';
$portfolio = new Portfolio;

session_start();
$userId = $_SESSION['id'];

$inputNomeProjeto = $_POST['inputNomeProjeto'];
$inputPrint = $_FILES['inputPrint'];
$inputUrlProjeto = $_POST['inputUrlProjeto'];

if($inputPrint && $inputNomeProjeto) {
    if ($portfolio->moreThanOne($userId) == false) {
        try{
            $pathProjects = $portfolio->setImage($inputPrint, 'projects');
            $newProject = "INSERT INTO projects VALUES(null, '".$pathProjects."', '" . $inputNomeProjeto . "', '" . $inputUrlProjeto . "', '" . $userId . "')";
            $portfolio->dataBase($newProject);
            return 'Projeto gravado com sucesso!';
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados do portfolio.";
        }
    } else {
        //à substituir
        if (!$portfolio->dataBase($newProject)) {
            $msg = "Erro ao gravar os projetos!";
        }
    }
}