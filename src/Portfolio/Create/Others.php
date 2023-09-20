<?php
include '../../db/Connection.php';

include 'Portfolio.php';
$portfolio = new Portfolio;

session_start();
$userId = $_SESSION['id'];

//Others
$banner = $_FILES['others'];
$url_banner = $_POST['url_others'];

if($banner && $url_banner) {
     
    try{
        //Others
        $pathOthers = $this->setImages($banner, 'others');
        foreach ($pathOthers as $banners) {
            $newOthers =  "INSERT INTO others VALUES(null, null, '" . $banners . "', '" . $url_banner . "', '" . $userId . "')";
            $this->dataBase($newOthers);
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados do portfolio.";
    }
}