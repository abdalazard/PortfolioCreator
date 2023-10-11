<?php
include '../../../db/Connection.php';

include '../Portfolio.php';

session_start();
$userId = $_SESSION['id'];

$inputNomeProjeto = $_POST['inputNomeProjeto'];
$inputPrint = $_FILES['inputPrint'];
$inputUrlProjeto = $_POST['inputUrlProjeto'];

if($inputPrint && $inputNomeProjeto) {
    $portfolio = new Portfolio;

    try{
        $pathProjects = $portfolio->setImage($inputPrint, 'projects');
        $newProject = "INSERT INTO projects VALUES(null, '".$pathProjects."', '" . $inputNomeProjeto . "', '" . $inputUrlProjeto . "', '" . $userId . "')";
        $saveProject = $portfolio->dataBase($newProject);
        if (!$saveProject) {
            return  "Erro ao gravar os projetos!";
        }
        return 'Projeto gravado com sucesso!';            
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados de projeto do portfolio.";
    }
    
}