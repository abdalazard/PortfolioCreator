<?php
include '../../db/Connection.php';

include 'Portfolio.php';
$portfolio = new Portfolio;

session_start();
$userId = $_SESSION['id'];

//Social
$email = $_POST['email'];
$github = $_POST['github'];
$linkedin = $_POST['linkedin'];
if($github && $linkedin) {

    if ($portfolio->moreThanOne($userId) == true) {

        $msg = 'Erro, contatos já existentes';
    } else {
        try{
            //Social
            $newSocial = "INSERT INTO social VALUES(null, '".$email."','" . $github . "', '" . $linkedin . "', '" . $userId . "')";
            $this->dataBase($newSocial);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados de contato do portfolio.";
        }
    }
}