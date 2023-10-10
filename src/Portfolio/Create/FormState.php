<?php
include '../../../db/Connection.php';
include '../Portfolio.php';

session_start();

$userId = $_SESSION['id'];
$action = $_POST['action'];
$state = $_POST['state'] ?? 0;
$column = $_POST['column'] ?? null;

if($action == "setState"){
    $portfolio = new Portfolio;
    $selectState = "SELECT * FROM formState WHERE id_user LIKE '".$userId."'";
    //";
    $queryState = $portfolio->dataBase($selectState);
    if(!$queryState) {
        echo "Erro ao verificar state";
    } else {
        $result = mysqli_num_rows($queryState);

        if($result >= 1) {
            if($column != null) {
                $data = mysqli_fetch_array($queryState);

                if($column == "profile") {
                    $updateState = "UPDATE formState SET profile = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                if($column == "skills") {
                    $updateState = "UPDATE formState SET skills = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                if($column == "projects") {
                    $updateState = "UPDATE formState SET projects = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                if($column == "others") {
                    $updateState = "UPDATE formState SET others = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                if($column == "contacts") {
                    $updateState = "UPDATE formState SET contacts = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $stateUpdate = $portfolio->dataBase($updateState);
                }
                echo "State ".$column." atualizado!";

            }            
            
            echo "Tabela de referecia para atualização de state nula!";

        } else {
            $createState = "INSERT INTO formState VALUES(null, 0, 0, 0, 0, 0, '".$userId."')";
            $queryState = $portfolio->dataBase($createState);
            echo "State criado!";
        }
        echo "State ok";
    }
} else {
    echo "Ação inválida.";
}
?>



