<?php
include '../../../db/Connection.php';
include '../Devfolio.php';
require_once '../../../vendor/autoload.php';

session_start();

$action = $_POST['action'];
$state = $_POST['state'] ?? 0;
$column = $_POST['column'] ?? null;

if($action == "setState"){
    $devfolio = new Devfolio;
    $userId = $_SESSION['id'];

    $selectState = "SELECT * FROM state WHERE id_user LIKE '".$userId."'";
    $queryState = $devfolio->dataBase($selectState);
    if(!$queryState || $queryState == null) {
        // $createNewState = "INSERT INTO state VALUES(null, '0','0','0','0','0', '" . $userId . "')";
        // $devfolio->dataBase($createNewState);
        echo "Problems to attempt to verify state";
    } else {
        $result = mysqli_num_rows($queryState);

        if($result >= 1) {
            if($column != null) {
                $data = mysqli_fetch_array($queryState);

                if($column == "profile") {
                    $updateState = "UPDATE state SET profile = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $devfolio->dataBase($updateState);
                }
                if($column == "skills") {
                    $updateState = "UPDATE state SET skills = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $devfolio->dataBase($updateState);
                }
                if($column == "projects") {
                    $updateState = "UPDATE state SET projects = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $devfolio->dataBase($updateState);
                }
                if($column == "others") {
                    $updateState = "UPDATE state SET others = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $devfolio->dataBase($updateState);
                }
                if($column == "contacts") {
                    $updateState = "UPDATE state SET contacts = '".$state."' WHERE id_user LIKE '".$userId."'";
                    $devfolio->dataBase($updateState);
                }
                echo "State ".$column." updated!";

            }            
            
            echo "Ref table to update state is null";

        } else {
            $createState = "INSERT INTO state VALUES(null, 0, 0, 0, 0, 0, '".$userId."')";
            $queryState = $devfolio->dataBase($createState);
            echo "State created successfully!";
        }
        echo "State 200";
    }
} else {
    echo "Invalid action!";
}
?>



