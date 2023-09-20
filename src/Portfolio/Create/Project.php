<?php
include '../../../db/Connection.php';

include '../Portfolio.php';
$portfolio = new Portfolio;

session_start();
$userId = $_SESSION['id'];

$data = json_decode(file_get_contents('php://input'), true);

foreach ($data as $d) {
    $inputPrint = $d['inputPrint'] ?? null;
    $inputNomeProjeto = $d['inputNomeProjeto'] ?? null;
    $inputUrlProjeto = $d['inputUrlProjeto'] ?? null;
} 

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