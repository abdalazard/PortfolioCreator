<?php
include '../../../db/Connection.php';
include '../Portfolio.php';

session_start();

$userId = $_POST['userId'];
$code = $_POST['status'] ?? 403;
$action = $_POST['action'];

if($action == "setStatus"){
    $portfolio = new Portfolio;
    $selectStatus = "SELECT * FROM status WHERE id_user LIKE '".$userId."'";
    $querySelect = $portfolio->dataBase($selectStatus);
    if(!$querySelect) {
        echo "Erro ao verificar status";
    } else {
        $resultSelect = mysqli_num_rows($querySelect);
        if($resultSelect >= 1) {
            $updateStatus = "UPDATE status SET status = '".$code."' WHERE id_user LIKE '".$userId."'";
            $queryUpdate = $portfolio->dataBase($updateStatus);
            echo "Status atualizado!";
        } else {
            $createStatus = "INSERT INTO status VALUES(null, 403, '".$userId."')";
            $queryCreate = $portfolio->dataBase($createStatus);
            echo "Status criado!";
        }
        echo "Status ok";
    }
} else {
    echo "Ação inválida.";
}
?>
