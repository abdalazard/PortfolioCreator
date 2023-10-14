<?php
include '../../../db/Connection.php';

include '../Portfolio.php';

session_start();
$userId = $_SESSION['id'];

//Others
$titulo = $_POST['titulo'];
$banner = $_FILES['others'];
$url_banner = $_POST['url_others'];
$dir = "../../../images/users/";

if($banner && $url_banner) {
    try{
        $portfolio = new Portfolio;

        $pathOthers = $portfolio->setImage($banner, 'others', $dir);
        $newOthers =  "INSERT INTO others VALUES(null, '".$titulo."', '" . $pathOthers . "', '" . $url_banner . "', '" . $userId . "')";
        $portfolio->dataBase($newOthers);
        return 'Link gravado com sucesso!';
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados de links extenos do portfolio.";
    }
}