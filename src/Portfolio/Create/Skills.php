<?php
include '../../../db/Connection.php';

include '../Portfolio.php';
$portfolio = new Portfolio;

session_start();
$userId = $_SESSION['id'];

$set = new Connection;
//Skills
$skills = $_FILES['skill'];

if($skills) {
    try{
        $pathSkills = $portfolio->setImages($skills, 'skills');
        foreach ($pathSkills as $skill) {
            $newSkill = "INSERT INTO skills VALUES(null, '" . $skill . "', '" . $userId . "')";
            $portfolio->dataBase($newSkill);
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados do portfolio.";
    }
}

?>
