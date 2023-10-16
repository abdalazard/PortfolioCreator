<?php
include '../../../db/Connection.php';
include '../Devfolio.php';

session_start();

$userId = $_POST['userId'];
$code = $_POST['status'] ?? 0;
$action = $_POST['action'];

if($action == "setStatus"){
    $devfolio = new Devfolio;
    $selectStatus = "SELECT * FROM status WHERE id_user LIKE '".$userId."'";
    $querySelect = $devfolio->dataBase($selectStatus);
    if(!$querySelect) {
        echo "Problems to attempt to verify this status";
    } else {
        $resultSelect = mysqli_num_rows($querySelect);
        if($resultSelect >= 1) {
            $updateStatus = "UPDATE status SET status = '".$code."' WHERE id_user LIKE '".$userId."'";
            $queryUpdate = $devfolio->dataBase($updateStatus);
        } else {
            $createStatus = "INSERT INTO status VALUES(null, 0, '".$userId."')";
            $queryCreate = $devfolio->dataBase($createStatus);
            echo "Status created sucessfully!";
        }
        echo "Status 200";
    }
} else {
    echo "Invalid action!";
}
?>
