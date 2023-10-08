<?php
include '../../../db/Connection.php';

include '../Portfolio.php';

session_start();
$userId = $_SESSION['id'];

//Social
$email = $_POST['email'];
$github = $_POST['github'];
$linkedin = $_POST['linkedin'];

// var_dump($email, $github, $linkedin);
try{
    //Social
    $portfolio = new Portfolio;

    $newSocial = "INSERT INTO social VALUES(null, '".$email."','" . $github . "', '" . $linkedin . "', '" . $userId . "')";
    $portfolio->dataBase($newSocial);
    return 'Contatos gravados com sucesso!';            
   
} catch (PDOException $e) {
    return "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados de contato do portfolio.";
}