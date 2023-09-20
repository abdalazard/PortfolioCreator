<?php
include '../../db/Connection.php';

include 'Portfolio.php';
$portfolio = new Portfolio;

session_start();
$userId = $_SESSION['id'];

//Skills
$skills = $_FILES['skill'];

if($skills) {
    try{
        $pathSkills = $this->setImages($skills, 'skills');
        foreach ($pathSkills as $skill) {
            $newSkill = "INSERT INTO skills VALUES(null, '" . $skill . "', '" . $userId . "')";
            $this->dataBase($newSkill);
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados do portfolio.";
    }
}