<?php
include '../../../db/Connection.php';

include '../Portfolio.php';

session_start();
$userId = $_SESSION['id'];

//Skills
$skills = $_FILES['skill'];

if($skills) {
    try{
        $portfolio = new Portfolio;

        $pathSkills = $portfolio->setImages($skills, 'skills');
        foreach ($pathSkills as $skill) {
            $newSkill = "INSERT INTO skills VALUES(null, '" . $skill . "', '" . $userId . "')";
            $portfolio->dataBase($newSkill);
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados de habilidades do portfolio.";
    }
}

?>
