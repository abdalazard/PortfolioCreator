<?php
include '../../../db/Connection.php';
include '../Portfolio.php';

session_start();

$action = $_POST['action'];
$state = $_POST['state'] ?? 0;
$column = $_POST['column'] ?? null;

if($action == "setState"){
    $portfolio = new Portfolio;
    $userId = $_SESSION['id'];

    $selectState = "SELECT * FROM formstate WHERE id_user LIKE '".$userId."'";
    $queryState = $portfolio->dataBase($selectState);
    if(!$queryState || $queryState == null) {
        echo "Erro ao verificar state";
    } else {
        $result = mysqli_num_rows($queryState);

        if($result >= 1) {
            if($column != null) {
                $data = mysqli_fetch_array($queryState);

                if($column == "profile") {
                    $updateState = "UPDATE formstate SET profile = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $portfolio->dataBase($updateState);
                }
                if($column == "skills") {
                    $updateState = "UPDATE formstate SET skills = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $portfolio->dataBase($updateState);
                }
                if($column == "projects") {
                    $updateState = "UPDATE formstate SET projects = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $portfolio->dataBase($updateState);
                }
                if($column == "others") {
                    $updateState = "UPDATE formstate SET others = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $portfolio->dataBase($updateState);
                }
                if($column == "contacts") {
                    $updateState = "UPDATE formstate SET contacts = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $portfolio->dataBase($updateState);
                }
                echo "State ".$column." atualizado!";

            }            
            
            echo "Tabela de referecia para atualização de state nula!";

        } else {
            $createState = "INSERT INTO formstate VALUES(null, 0, 0, 0, 0, 0, '".$userId."')";
            $queryState = $portfolio->dataBase($createState);
            echo "State criado!";
        }
        echo "State ok";
    }
} else {
    echo "Ação inválida.";
}
?>



