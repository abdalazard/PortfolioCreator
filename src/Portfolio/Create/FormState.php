<?php
include '../../../db/Connection.php';
include '../Portfolio.php';

session_start();

$userId = $_POST['userId'];
$action = $_POST['action'];
$statusId = $_POST['statusId'];
$status = $_POST['status'] ?? false;
$table = $_POST['column'] ?? null;

if($action == "setState"){
    $portfolio = new Portfolio;
    $selectState = "SELECT * FROM formState WHERE id_user LIKE '".$userId."' AND id_status LIKE '".$statusId."'";
    $queryState = $portfolio->dataBase($selectState);
    if(!$queryState) {
        echo "Erro ao verificar state";
    } else {
        $result = mysqli_num_rows($queryState);

        if($result >= 1) {
            if($table != null) {
                $data = mysqli_fetch_array($queryState);

                if($table == "profile") {
                    $updateState = "UPDATE formState SET profile = '".$status."' WHERE id_user LIKE '".$userId."' AND id_status LIKE '".$statusId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                if($table == "skills") {
                    $updateState = "UPDATE formState SET skills = '".$status."' WHERE id_user LIKE '".$userId."' AND id_status LIKE '".$statusId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                if($table == "projects") {
                    $updateState = "UPDATE formState SET projects = '".$status."' WHERE id_user LIKE '".$userId."' AND id_status LIKE '".$statusId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                if($table == "others") {
                    $updateState = "UPDATE formState SET others = '".$status."' WHERE id_user LIKE '".$userId."' AND id_status LIKE '".$statusId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                if($table == "contacts") {
                    $updateState = "UPDATE formState SET contacts = '".$status."' WHERE id_user LIKE '".$userId."' AND id_status LIKE '".$statusId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                echo "State ".$table." atualizado!";

            }            
            
            echo "Tabela de referecia para atualização de state nula!";

        } else {
            $createState = "INSERT INTO formState VALUES(null, 0, 0, 0, 0, 0, '".$statusId."', '".$userId."')";
            $queryState = $portfolio->dataBase($createState);
            echo "State criado!";
        }
        echo "State ok";
    }
} else {
    echo "Ação inválida.";
}
?>



