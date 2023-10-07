<?php
include '../../../db/Connection.php';

include '../Portfolio.php';

session_start();
$userId = $_SESSION['id'];

//Social
$email = $_POST['email'];
$github = $_POST['github'];
$linkedin = $_POST['linkedin'];
if($github && $linkedin) {
    $portfolio = new Portfolio;

    if ($portfolio->moreThanOne($userId) == true) {
        $msg = 'Erro, contatos já existentes';
        return [$msg => "msg"];
    } else {
        try{
            //Social
            $newSocial = "INSERT INTO social VALUES(null, '".$email."','" . $github . "', '" . $linkedin . "', '" . $userId . "')";
            $portfolio->dataBase($newSocial);
            
        } catch (PDOException $e) {
            return "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados de contato do portfolio.";
        }
    }
}